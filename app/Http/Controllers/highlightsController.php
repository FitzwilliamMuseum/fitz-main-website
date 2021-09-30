<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Collection;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Cache;

use Solarium\Client;
use Solarium\Core\Client\Adapter\Curl;
use Symfony\Component\EventDispatcher\EventDispatcher;
use Solarium\Exception;

use App\DirectUs;
use App\MoreLikeThis;

use Illuminate\Support\Str;

use App\Models\FindMoreLikeThis;
use App\Models\Highlights;
use App\Models\CIIM;
use App\Models\AudioGuide;
use App\Models\HighlightPages;
use App\Models\HighlightThemes;
use App\Models\HighlightPeriods;
use App\Models\Stubs;
use App\Models\StaffObjects;

class highlightsController extends Controller
{
    public function index(Request $request)
    {
      $paginator = Highlights::list($request);
      $pharos = $paginator->items();
      return view('highlights.index', compact('paginator', 'pharos'));
    }

    public function details(string $slug)
    {
      $pharos = Highlights::find($slug);
      if(empty($pharos['data'])){
        return response()->view('errors.404',[],404);
      }
      $records = FindMoreLikeThis::find($slug, 'pharos');
      $adlib = CIIM::findByAccession(Str::upper($pharos['data'][0]['adlib_id']));
      $shopify = FindMoreLikeThis::find($slug, 'shopify');
      return view('highlights.details', compact('pharos', 'records', 'adlib', 'shopify'));
    }

    public function associate($section, $slug)
    {
      $pharos = HighlightPages::list($slug, $section);
      $records = FindMoreLikeThis::find($slug, '"pharos-pages"');
      return view('highlights.associate', compact('pharos', 'records'));
    }

    public function landing()
    {
      $page = Stubs::getHighlightPage(9);
      $pharos = HighlightThemes::list();
      $periods = Highlights::getPeriods();
      $periods = $this->group_by("period_assigned", $periods['data']);
      $contexts = HighlightPages::getContexts();
      $context = $this->group_by("section", $contexts['data']);
      return view('highlights.landing', compact('pharos', 'periods', 'context', 'page'));
    }

    /** Get results for search
     *
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function results(Request $request)
    {

        $this->validate($request, [
            'query' => 'required|max:200|min:3',
        ]);

        $queryString = \Purifier::clean($request->get('query'), array('HTML.Allowed' => ''));
        $key = md5($queryString . ' contentType:pharos'. $request->get('page'));
        $perPage = 20;
        $expiresAt = now()->addMinutes(3600);
        $from = ($request->get('page', 1) - 1) * $perPage;
        if (Cache::has($key)) {
            $data = Cache::store('file')->get($key);
        } else {
            $configSolr = \Config::get('solarium');
            $this->client = new Client(new Curl(), new EventDispatcher(), $configSolr);
            $query = $this->client->createSelect();
            $query->setQuery($queryString . ' contentType:pharos');
            $query->setQueryDefaultOperator('AND');
            $query->setStart($from);
            $query->setRows($perPage);
            // get the facetset component
            $facetSet = $query->getFacetSet();

            $data = $this->client->select($query);
            Cache::store('file')->put($key, $data, $expiresAt);
        }
        $number = $data->getNumFound();
        $records = $data->getDocuments();
        $paginate = new LengthAwarePaginator($records, $number, $perPage);
        $paginate->setPath($request->getBaseUrl() . '?query='. $queryString);
        return view('highlights.results', compact('records', 'number', 'paginate', 'queryString'));
    }

    public function audioguide()
    {
      $stops = AudioGuide::list();
      return view('highlights.audioguide', compact('stops'));
    }

    public function stop(string $slug)
    {
      $stop = AudioGuide::find($slug);
      $records = FindMoreLikeThis::find($slug, 'audioguide');
      return view('highlights.stop', compact('stop', 'records'));
    }

    public function pharosSections(string $section){
      $pharos = HighlightPages::getBySection($section);
      return view('highlights.sections', compact('pharos'));
    }

    public function contextual()
    {
      $pharos  = HighlightPages::getByContext();
      $context = $this->group_by("section", $pharos['data']);
      return view('highlights.context', compact('context'));
    }

    public function period()
    {
      $pharos  = Highlights::getPeriods();
      $periods = $this->group_by("period_assigned", $pharos['data']);
      return view('highlights.period', compact('periods'));
    }

    public function byperiod($period)
    {
      $pharos = Highlights::findByPeriod($period);
      $period = HighlightPeriods::find($period);
      return view('highlights.byperiod', compact('pharos', 'period'));
    }

    public function theme()
    {
      $pharos = HighlightThemes::list();
      return view('highlights.theme', compact('pharos'));
    }

    public function bytheme($theme)
    {
      $pharos = HighlightThemes::find($theme);
      $theme = HighlightThemes::getDetails($theme);
      return view('highlights.bytheme', compact('pharos', 'theme'));
    }


    /**
     * Function that groups an array of associative arrays by some key.
     *
     * @param {String} $key Property to sort by.
     * @param {Array} $data Array that stores multiple associative arrays.
     */
     public function group_by($key, $data) {
        $result = array();
        foreach($data as $val) {
            if(array_key_exists($key, $val)){
                $result[$val[$key]][] = $val;
            }else{
                $result[""][] = $val;
            }
        }
        return $result;
    }

    public function fitzobjects(Request $request)
    {
      $paginator = StaffObjects::list($request);
      $week = $paginator->items();
      return view('highlights.fitz-objects', compact('week', 'paginator'));
    }

    public function fitzobject($slug)
    {
      $week = StaffObjects::find($slug);
      return view('highlights.fitz-object', compact('week'));
    }
}
