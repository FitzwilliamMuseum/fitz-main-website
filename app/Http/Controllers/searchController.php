<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Solarium\Core\Client\Client;
use Solarium\Exception;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Cache;
use Mews\Purifier;

class searchController extends Controller
{
  /**
   * @var \Solarium\Client
   */
  protected $client;

  public function __construct(\Solarium\Client $client)
  {
      $this->client = $client;
  }

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
      $perPage = 20;
      $expiresAt = now()->addMinutes(3600);
      $from = ($request->get('page', 1) - 1) * $perPage;
      // if (Cache::has($key)) {
      //     $data = Cache::store('file')->get($key);
      // } else {
          $configSolr = \Config::get('solarium');
          $this->client = new Client($configSolr);
          $query = $this->client->createSelect();
          $query->setQuery($queryString);
          $query->setQueryDefaultOperator('AND');
          $query->setStart($from);
          $query->setRows($perPage);
          $data = $this->client->select($query);
      //     Cache::store('file')->put($key, $data, $expiresAt);
      // }
      $number = $data->getNumFound();
      $records = $data->getDocuments();
      $paginate = new LengthAwarePaginator($records, $number, $perPage);
      $paginate->setPath($request->getBaseUrl() . '?query='. $queryString);
      return view('search.results', compact('records', 'number', 'paginate', 'queryString'));
  }


  /** Ping function for search
   * @return \Illuminate\Http\JsonResponse
   */

  public function ping()
  {
      // create a ping query
      $ping = $this->client->createPing();
      // execute the ping query
      try {
          $this->client->ping($ping);
          return response()->json('OK');
      } catch (\Exception $e) {
          return response()->json('ERROR', 500);
      }
  }
}
