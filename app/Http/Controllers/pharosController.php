<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Collection;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Cache;
use Solarium\Core\Client\Client;

use App\DirectUs;
use App\MoreLikeThis;

class pharosController extends Controller
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
            'meta' => '*',
            'limit' => $perPage,
            'offset' => $offset
        )
      );
      $pharos = $api->getData();
      $currentPage = LengthAwarePaginator::resolveCurrentPage();
      $total = $pharos['meta']['total_count'];
      $paginator = new LengthAwarePaginator($pharos, $total, $perPage, $currentPage);
      $paginator->setPath('pharos');
      return view('pharos.index', compact('pharos', 'paginator'));
    }

    public function details( $slug)
    {
      $api = $this->getApi();
      $api->setEndpoint('pharos');
      $api->setArguments(
        $args = array(
            'fields' => '*.*.*.*.*',
            'meta' => '*',
            'filter[slug][eq]' => $slug,
        )
      );
      $pharos = $api->getData();
      $mlt = new MoreLikeThis;
      $mlt->setLimit(3)->setType('pharos')->setQuery($slug);
      $records = $mlt->getData();
      return view('pharos.details', compact('pharos', 'records'));
    }

    public function associate($section, $slug)
    {
      $api = $this->getApi();
      $api->setEndpoint('pharos_pages');
      $api->setArguments(
        $args = array(
            'fields' => '*.*.*.*.*.*',
            'meta' => '*',
            'filter[slug][eq]' => $slug,
            'filter[section][eq]' => $section
        )
      );
      $pharos = $api->getData();

      $mlt = new MoreLikeThis;
      $mlt->setLimit(3)->setType('pharospages')->setQuery($slug);
      $records = $mlt->getData();
      return view('pharos.associate', compact('pharos', 'records'));
    }

    public function landing()
    {
      return view('pharos.landing');
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
            $this->client = new Client($configSolr);
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
        return view('pharos.results', compact('records', 'number', 'paginate', 'queryString'));
    }

}
