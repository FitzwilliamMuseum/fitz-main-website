<?php

namespace App\Http\Controllers;

use App\Models\AudioGuide;
use App\Models\CIIM;
use App\Models\FindMoreLikeThis;
use App\Models\HighlightPages;
use App\Models\HighlightPeriods;
use App\Models\Highlights;
use App\Models\HighlightThemes;
use App\Models\StaffObjects;
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
        }
        $records = FindMoreLikeThis::find($slug, 'highlights');
        $adlib = CIIM::findByAccession(Str::upper($pharos['data'][0]['adlib_id']));
        $shopify = FindMoreLikeThis::find($slug, 'shopify');
        return view('highlights.details', compact('pharos', 'records', 'adlib', 'shopify'));
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
        return view('highlights.associate', compact('pharos', 'records', 'highlights'));
    }

    /**
     * @return View
     */
    public function landing(): View
    {
        $page = Stubs::getHighlightPage(9);
        $pharos = HighlightThemes::list();
        $periods = Highlights::getPeriods();
        $periods = $this->group_by("period_assigned", $periods['data']);
        $contexts = HighlightPages::getContexts();
        $contexts = $this->group_by("section", $contexts['data']);
        return view('highlights.landing', compact('pharos', 'periods', 'contexts', 'page'));
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
     * @return View
     * @throws InvalidArgumentException
     */
    public function stop(string $slug): View
    {
        $stop = AudioGuide::find($slug);
        $records = FindMoreLikeThis::find($slug, 'audioguide');
        return view('highlights.stop', compact('stop', 'records'));
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
     * @return View
     */
    public function contextual(): View
    {
        $pharos = HighlightPages::getByContext();
        $context = $this->group_by("section", $pharos['data']);
        return view('highlights.context', compact('context'));
    }

    /**
     * @return View
     */
    public function period(): View
    {
        $pharos = Highlights::getPeriods();
        $periods = $this->group_by("period_assigned", $pharos['data']);
        return view('highlights.period', compact('periods'));
    }

    /**
     * @param string $period
     * @return View
     */
    public function byperiod(string $period): View
    {
        $pharos = Highlights::findByPeriod($period);
        $period = HighlightPeriods::find($period);
        return view('highlights.byperiod', compact('pharos', 'period'));
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
     * @return View
     */
    public function bytheme(string $theme): View
    {
        $pharos = HighlightThemes::find($theme);
        $theme = HighlightThemes::getDetails($theme);
        return view('highlights.bytheme', compact('pharos', 'theme'));
    }
}
