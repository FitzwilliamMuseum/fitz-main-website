<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Solarium\Client;
use Solarium\Core\Client\Adapter\Curl;
use Symfony\Component\EventDispatcher\EventDispatcher;
use Solarium\Exception;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Cache;
use Mews\Purifier;


class searchController extends Controller
{
  /**
   * The index page of the search system
   * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
   */
  public function index()
  {
      return view('search.index');
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
      $key = md5($queryString . $request->get('page'));
      $perPage = 12;
      $expiresAt = now()->addMinutes(3600);
      $from = ($request->get('page', 1) - 1) * $perPage;
      if (Cache::has($key)) {
          $data = Cache::store('file')->get($key);
      } else {
          $configSolr = \Config::get('solarium');
          $this->client = new Client(new Curl(), new EventDispatcher(), $configSolr);
          $query = $this->client->createSelect();
          $query->setQuery($queryString);
          $query->setQueryDefaultOperator('AND');
          $query->setStart($from);
          $query->setRows($perPage);
          // get the facetset component
          $facetSet = $query->getFacetSet();
          // create a facet field instance and set options
          $facetSet->createFacetField('type')->setField('contentType');
          $data = $this->client->select($query);
          Cache::store('file')->put($key, $data, $expiresAt);
      }
      $number = $data->getNumFound();
      $records = $data->getDocuments();
      $paginate = new LengthAwarePaginator($records, $number, $perPage);
      $paginate->setPath($request->getBaseUrl() . '?query='. $queryString);
      return view('search.results', compact('records', 'number', 'paginate', 'queryString'));
  }
  /**
   * This is used to inject search results based off URL string into the 404 pages
   * 
   * @param  [type] $path               [description]
   * @return [type]       [description]
   */
  public static function injectResults( $path )
  {
      $path = \Purifier::clean($path, array('HTML.Allowed' => ''));
      $key = md5($path . '404');
      $path = str_replace(array('/','-'),array(' ', ' '),$path);

      $expiresAt = now()->addMinutes(3600);
      if (Cache::has($key)) {
          $data = Cache::store('file')->get($key);
      } else {
          $configSolr = \Config::get('solarium');
          $client = new Client(new Curl(), new EventDispatcher(), $configSolr);
          $query = $client->createSelect();
          $query->setQuery($path);
          $query->setRows(3);
          $data = $client->select($query);
          Cache::store('file')->put($key, $data, $expiresAt);
      }
      $records = $data->getDocuments();
      return $records;
  }

  /** Ping function for search
   * @return \Illuminate\Http\JsonResponse
   */

  public function ping()
  {
      $configSolr = \Config::get('solarium');
      $this->client = new Client(new Curl(), new EventDispatcher(), $configSolr);
      $ping = $this->client->createPing();
      try {
          $this->client->ping($ping);
          return response()->json('OK');
      } catch (\Exception $e) {
          return response()->json('ERROR', 500);
      }
  }
}
