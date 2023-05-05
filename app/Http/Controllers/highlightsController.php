<?php

namespace App\Http\Controllers;

use App\Models\AudioGuide;
use App\Models\CIIM;
use App\Models\FindMoreLikeThis;
use App\Models\HighlightPages;
use App\Models\HighlightPeriods;
use App\Models\Highlights;
use App\Models\HighlightThemes;
use App\Models\SolrSearch;
use App\Models\Stubs;
use Illuminate\Support\Facades\Config;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;
use Mews\Purifier\Facades\Purifier;
use Psr\SimpleCache\InvalidArgumentException;
use Solarium\Client;
use Solarium\Core\Client\Adapter\Curl;
use Symfony\Component\EventDispatcher\EventDispatcher;

class highlightsController extends Controller
{

    /**
     * @param Request $request
     * @return View
     */
    public function index(Request $request): View
    {
        $paginator = Highlights::list($request);
        return view('highlights.index', compact('paginator'));
    }

    /**
     * @param string $slug
     * @return View|Response
     * @throws InvalidArgumentException
     */
    public function details(string $slug): Response|View
    {
        $pharos = Highlights::find($slug);
        if (empty($pharos['data'])) {
            return response()->view('errors.404', [], 404);
        } else {
            $records = FindMoreLikeThis::find($slug, 'highlights');
            $adlib = CIIM::findByAccession(Str::upper($pharos['data'][0]['adlib_id']));
            $shopify = FindMoreLikeThis::find($slug, 'shopify');
            return view('highlights.details', [
                'pharos' => Collect($pharos['data'])->first(),
                'records' => $records,
                'adlib' => $adlib,
                'shopify' => $shopify
            ]);
        }
    }

    /**
     * @param string $section
     * @param string $slug
     * @return View
     * @throws InvalidArgumentException
     */
    public function associate(string $section, string $slug): View
    {
        $pharos = HighlightPages::list($slug, $section);
        $records = FindMoreLikeThis::find($slug, '"pharos-pages"');
        $highlights = FindMoreLikeThis::find($slug, 'highlights');
        return view('highlights.associate', [
            'pharos' => Collect($pharos['data'])->first(),
            'records' => $records,
            'highlights' => $highlights,
        ]);
    }

    /**
     * @return View
     */
    public function landing(): View
    {
        $periods = Highlights::getPeriods();
        $periodsGrouped = $this->group_by("period_assigned", $periods['data']);
        $contexts = HighlightPages::getContexts();
        $contextsGrouped = $this->group_by("section", $contexts['data']);
        return view('highlights.landing', [
            'pharos' => HighlightThemes::list(),
            'periods'=> $periodsGrouped,
            'contexts' => $contextsGrouped,
            'page' => Stubs::getHighlightPage(9)
        ]);
    }

    /**
     * Function that groups an array of associative arrays by some key.
     * @param string $key
     * @param array $data
     * @return array
     */
    public function group_by(string $key, array $data): array
    {
        $result = array();
        foreach ($data as $val) {
            if (array_key_exists($key, $val)) {
                $result[$val[$key]][] = $val;
            } else {
                $result[""][] = $val;
            }
        }
        return $result;
    }

    /**
     * @param Request $request
     * @return View
     * @throws ValidationException
     * @throws InvalidArgumentException
     */
    public function results(Request $request): View
    {
        $this->validate($request, [
            'query' => 'required|max:200|min:3',
        ]);

        $queryString = Purifier::clean($request->get('query'), array('HTML.Allowed' => ''));
        $key = md5($queryString . ' contentType:pharos' . $request->get('page'));
        $perPage = 24;
        $expiresAt = now()->addMinutes(3600);
        $from = ($request->get('page', 1) - 1) * $perPage;

        if (!SolrSearch::isSolrEnabled()) {
            $data = [];

        } else {
            if (Cache::has($key)) {
                $data = Cache::store('file')->get($key);
            } else {
                $configSolr = Config::get('solarium');
                $client = new Client(new Curl(), new EventDispatcher(), $configSolr);
                $query = $client->createSelect();
                $query->setQuery($queryString . ' contentType:pharos');
                $query->setQueryDefaultOperator('AND');
                $query->setStart($from);
                $query->setRows($perPage);
                $data = $client->select($query);
                Cache::store('file')->put($key, $data, $expiresAt);
            }
        }

        $number = $data->getNumFound();
        $records = $data->getDocuments();
        $paginate = new LengthAwarePaginator($records, $number, $perPage);
        $paginate->setPath($request->getBaseUrl() . '?query=' . $queryString);
        return view('highlights.results', compact('records', 'number', 'paginate', 'queryString'));
    }

    /**
     * @return View
     */
    public function audioguide(): View
    {
        $stops = AudioGuide::list();
        return view('highlights.audioguide', compact('stops'));
    }

    /**
     * @param string $slug
     * @return View|Response
     * @throws InvalidArgumentException
     */
    public function stop(string $slug): View|Response
    {
        $stop = AudioGuide::find($slug);
        if(empty($stop['data'])){
            return response()->view('errors.404', [], 404);
        } else {
            $records = FindMoreLikeThis::find($slug, 'audioguide');
            return view('highlights.stop',
                [
                    'stop' => Collect($stop['data'])->first(),
                    'records' => $records
                ]
            );
        }
    }

    /**
     * @param string $section
     * @return View
     */
    public function pharosSections(string $section): View
    {
        $pharos = HighlightPages::getBySection($section);
        return view('highlights.sections', compact('pharos'));
    }

    /**
     * @return View|Response
     */
    public function contextual(): View|Response
    {
        $pharos = HighlightPages::getByContext();
        if(empty($pharos['data'])){
            return response()->view('errors.404', [], 404);
        } else {
            $context = $this->group_by("section", $pharos['data']);
            return view('highlights.context', compact('context'));
        }
    }

    /**
     * @return View|Response
     */
    public function period(): View|Response
    {
        $pharos = Highlights::getPeriods();
        if(empty($pharos['data'])){
            return response()->view('errors.404', [], 404);
        } else {
            $periods = $this->group_by("period_assigned", $pharos['data']);
            return view('highlights.period', compact('periods'));
        }
    }

    /**
     * @param string $period
     * @return View|Response
     */
    public function byPeriod(string $period): View|Response
    {
        $pharos = Highlights::findByPeriod($period);
        if(empty($pharos['data'])){
            return response()->view('errors.404', [], 404);
        } else {
            $period = HighlightPeriods::find($period);
            return view('highlights.byperiod', [
                'pharos'=> $pharos,
                'period' => Collect($period['data'])->first()
            ]);
        }
    }

    /**
     * @return View
     */
    public function theme(): View
    {
        $pharos = HighlightThemes::list();
        return view('highlights.theme', compact('pharos'));
    }

    /**
     * @param string $theme
     * @return View|Response
     */
    public function byTheme(string $theme): View|Response
    {

        $pharos = HighlightThemes::find($theme);
        if(empty($pharos['data'])){
            return response()->view('errors.404', [], 404);
        } else {
            $theme = HighlightThemes::getDetails($theme);
            return view('highlights.bytheme', [
                'pharos'=> $pharos,
                'theme' => Collect($theme['data'])->first()
            ]);
        }
    }
}
