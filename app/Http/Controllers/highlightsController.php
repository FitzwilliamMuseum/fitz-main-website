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
use Elasticsearch\ClientBuilder;
use App\FitzElastic\Elastic;
use Illuminate\Support\Str;

class highlightsController extends Controller
{
    

    public function index(Request $request)
    {
      $perPage = 12;
      $offset = ($request->page -1) * $perPage ;
      $api = $this->getApi();
      $api->setEndpoint('pharos');
      $api->setArguments(
        $args = array(
            'fields' => '*.*.*.*',
            'meta' => 'result_count,total_count,type',
            'limit' => $perPage,
            'offset' => $offset
        )
      );
      $pharos = $api->getData();
      $currentPage = LengthAwarePaginator::resolveCurrentPage();
      $total = $pharos['meta']['total_count'];
      $paginator = new LengthAwarePaginator($pharos, $total, $perPage, $currentPage);
      $paginator->setPath('highlights');
      return view('highlights.index', compact('pharos', 'paginator'));
    }

    public function details($slug)
    {
      $api = $this->getApi();
      $api->setEndpoint('pharos');
      $api->setArguments(
        $args = array(
            'fields' => '*.*.*.*.*',
            'meta' => 'result_count,total_count,type',
            'filter[slug][eq]' => $slug,
        )
      );
      $pharos = $api->getData();
      $mlt = new MoreLikeThis;
      $mlt->setLimit(3)->setType('pharos')->setQuery($slug);
      $records = $mlt->getData();
      $string = '{
        "query": {
          "bool": {
            "must": [
              {
                "match": {
                  "identifier.accession_number": {
                    "query": "' . Str::upper($pharos['data'][0]['adlib_id']) . '",
                    "operator": "and"
                  }
                }
              }
            ]
          }
        }
      }';
      $params = [
        'index' => 'ciim',
        'size' => 1,
        'body'  => $string
      ];

      $adlib = $this->getElastic()->setParams($params)->getSearch();
      $adlib = $adlib['hits']['hits'];

      $more = new MoreLikeThis;
      $more->setLimit(3)->setType('shopify')->setQuery($slug);
      $shopify = $more->getData();
      return view('highlights.details', compact('pharos', 'records', 'adlib', 'shopify'));
    }

    public function associate($section, $slug)
    {
      $api = $this->getApi();
      $api->setEndpoint('pharos_pages');
      $api->setArguments(
        $args = array(
            'fields' => '*.*.*.*.*.*',
            'meta' => 'result_count,total_count,type',
            'filter[slug][eq]' => $slug,
            'filter[section][eq]' => $section
        )
      );
      $pharos = $api->getData();

      $mlt = new MoreLikeThis;
      $mlt->setLimit(3)->setType('pharospages')->setQuery($slug);
      $records = $mlt->getData();
      return view('highlights.associate', compact('pharos', 'records'));
    }

    public function landing()
    {
      $intro = $this->getApi();
      $intro->setEndpoint('stubs_and_pages');
      $intro->setArguments(
          $args = array(
              'fields' => '*.*.*',
              'meta' => 'result_count,total_count,type',
              'filter[id][eq]' => 9
          )
        );
      $page = $intro->getData();
      $page = $page['data'][0]['body'];

      $api = $this->getApi();
      $api->setEndpoint('pharos_themes');
      $api->setArguments(
        $args = array(
            'fields' => '*.*.*',
            'meta' => 'result_count,total_count,type'
        )
      );
      $pharos = $api->getData();

      $api2 = $this->getApi();
      $api2->setEndpoint('pharos');
      $api2->setArguments(
        $args = array(
          'fields' => 'period_assigned,image.*',
          'meta' => 'result_count,total_count,type',
          'limit' => 200
        )
      );
      $periods = $api2->getData();
      $periods = $this->group_by("period_assigned", $periods['data']);

      $api3 = $this->getApi();
      $api3->setEndpoint('pharos_pages');
      $api3->setArguments(
        $args = array(
            'fields' => 'section,hero_image_alt_text,hero_image.*',
            'meta' => 'result_count,total_count,type'
        )
      );
      $contexts = $api3->getData();
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
      $first = $this->getApi();
      $first->setEndpoint('audio_guide');
      $first->setArguments(
        array(

          'fields' => '*.*.*.*',
          'sort' => 'stop_number'
        )
      );
      $stops = $first->getData();
      return view('highlights.audioguide', compact('stops'));
    }

    public function stop($slug)
    {
      $api = $this->getApi();
      $api->setEndpoint('audio_guide');
      $api->setArguments(
        $args = array(
            'fields' => '*.*.*.*.*',
            'meta' => 'result_count,total_count,type',
            'filter[slug][eq]' => $slug,
        )
      );
      $stop = $api->getData();
      $mlt = new MoreLikeThis;
      $mlt->setLimit(3)->setType('audioguide')->setQuery($slug);
      $records = $mlt->getData();
      return view('highlights.stop', compact('stop', 'records'));
    }

    public function pharosSections($section){
      $api = $this->getApi();
      $api->setEndpoint('pharos_pages');
      $api->setArguments(
        $args = array(
            'fields' => '*.*.*.*.*.*',
            'meta' => 'result_count,total_count,type',
            'filter[section][eq]' => $section
        )
      );
      $pharos = $api->getData();
      return view('highlights.sections', compact('pharos'));
    }

    public function contextual()
    {
      $api = $this->getApi();
      $api->setEndpoint('pharos_pages');
      $api->setArguments(
        $args = array(
            'fields' => 'section,hero_image.*',
            'meta' => 'result_count,total_count,type'
        )
      );
      $pharos = $api->getData();
      $context = $this->group_by("section", $pharos['data']);
      return view('highlights.context', compact('context'));
    }

    public function period()
    {
      $api = $this->getApi();
      $api->setEndpoint('pharos');
      $api->setArguments(
        $args = array(
            'fields' => 'period_assigned,image.*',
            'meta' => 'result_count,total_count,type',
            'limit' => 200
        )
      );
      $pharos = $api->getData();
      $theme = $this->group_by("period_assigned", $pharos['data']);
      return view('highlights.period', compact('theme'));
    }

    public function byperiod($period)
    {
      if($period == 'italy-1400-1700'){
        $query = 'Italy 1400 - 1700';
      } elseif($period == 'northern-europe-1400-1700') {
        $query = 'Italy 1400 - 1700';
      } else {
        $query = str_replace('-',' ', $period);
      }
      $api = $this->getApi();
      $api->setEndpoint('pharos');
      $api->setArguments(
        $args = array(
            'fields' => '*.*.*.*.*.*',
            'meta' => 'result_count,total_count,type',
            'filter[period_assigned][eq]' =>  $query
        )
      );
      $pharos = $api->getData();

      $api2 = $this->getApi();
      $api2->setEndpoint('pharos_periods');
      $api2->setArguments(
        $args = array(
            'fields' => '*.*.*.*.*.*',
            'meta' => 'result_count,total_count,type',
            'filter[slug][like]' => $period
        )
      );
      $period = $api2->getData();
      return view('highlights.byperiod', compact('pharos', 'period'));
    }

    public function theme()
    {
      $api = $this->getApi();
      $api->setEndpoint('pharos_themes');
      $api->setArguments(
        $args = array(
            'fields' => '*.*.*',
            'meta' => 'result_count,total_count,type'
        )
      );
      $pharos = $api->getData();
      return view('highlights.theme', compact('pharos'));
    }


    public function bytheme($theme)
    {
      $api = $this->getApi();
      $api->setEndpoint('pharos');
      $api->setArguments(
        $args = array(
            'fields' => '*.*.*',
            'meta' => 'result_count,total_count,type',
            'filter[themes][contains]' => $theme,
        )
      );
      $pharos = $api->getData();
      $api2 = $this->getApi();
      $api2->setEndpoint('pharos_themes');
      $api2->setArguments(
        $args = array(
            'fields' => '*.*.*.*.*.*',
            'meta' => 'result_count,total_count,type',
            'filter[slug][eq]' => $theme,
            'limit' => 1
        )
      );
      $theme = $api2->getData();
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
      $perPage = 12;
      $offset = ($request->page -1) * $perPage ;
      $api = $this->getApi();
      $api->setEndpoint('staff_object_of_the_week');
      $api->setArguments(
        $args = array(
            'fields' => '*.*.*.*',
            'meta' => 'result_count,total_count,type',
            'limit' => $perPage,
            'offset' => $offset,
            'sort' => '-publication_date'
        )
      );
      $week = $api->getData();
      $currentPage = LengthAwarePaginator::resolveCurrentPage();
      $total = $week['meta']['total_count'];
      $paginator = new LengthAwarePaginator($week, $total, $perPage, $currentPage);
      $paginator->setPath('staff-favourites');
      return view('highlights.fitz-objects', compact('week', 'paginator'));
    }

    public function fitzobject($slug)
    {
      $api = $this->getApi();
      $api->setEndpoint('staff_object_of_the_week');
      $api->setArguments(
        $args = array(
            'fields' => '*.*.*.*.*',
            'meta' => 'result_count,total_count,type',
            'filter[slug][eq]' => $slug,
        )
      );
      $week = $api->getData();


      return view('highlights.fitz-object', compact('week'));
    }
}
