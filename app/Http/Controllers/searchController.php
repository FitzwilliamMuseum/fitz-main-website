<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Solarium\Core\Client\Client;
use Solarium\Exception;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Cache;
use Mews\Purifier;
use App\Directus;

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

  public function staff()
  {
    $api = $this->getApi();
    $api->setEndpoint('staff_profiles');
    $api->setArguments(
      $args = array(
          'limit' => '500',
          'fields' => 'id,display_name,biography, slug'
      )
    );
    $url = '/research/staff-profiles/';
    $profiles = $api->getData();
    $configSolr = \Config::get('solarium');
    $this->client = new Client($configSolr);
    $update = $this->client->createUpdate();
    $documents = array();
    foreach($profiles['data'] as $profile)
    {
      $doc = $update->createDocument();
      $doc->id = $profile['id'] . '-staff';
      $doc->title = $profile['display_name'];
      $doc->description = strip_tags($profile['biography']);
      $doc->slug = $profile['slug'];
      $doc->url = $url;
      $doc->contentType = 'staffProfile';
      $documents[] = $doc;

    }

    // add the documents and a commit command to the update query
    $update->addDocuments($documents);
    $update->addCommit();
    // this executes the query and returns the result
    $result = $this->client->update($update);
  }

  public function news()
  {
    $api = $this->getApi();
    $api->setEndpoint('news_articles');
    $api->setArguments(
      $args = array(
          'limit' => '500',
          'fields' => 'id,article_title,article_body,slug'
      )
    );
    $url = '/news/article/';
    $profiles = $api->getData();
    $configSolr = \Config::get('solarium');
    $this->client = new Client($configSolr);
    $update = $this->client->createUpdate();
    $documents = array();
    foreach($profiles['data'] as $profile)
    {
      $doc = $update->createDocument();
      $doc->id = $profile['id'] . '-news';
      $doc->title = $profile['article_title'];
      $doc->description = strip_tags($profile['article_body']);
      $doc->slug = $profile['slug'];
      $doc->url = $url;
      $doc->contentType = 'news';
      $documents[] = $doc;
    }
    // add the documents and a commit command to the update query
    $update->addDocuments($documents);
    $update->addCommit();
    // this executes the query and returns the result
    $result = $this->client->update($update);
  }



  function change_key( $array, $old_key, $new_key ) {

    if( ! array_key_exists( $old_key, $array ) )
        return $array;

    $keys = array_keys( $array );
    $keys[ array_search( $old_key, $keys ) ] = $new_key;

    return array_combine( $keys, $array );
  }
}
