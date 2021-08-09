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
use App\Directus;
use InstagramScraper\Instagram;
use PHPShopify\ShopifySDK;
use Phpfastcache\Helper\Psr16Adapter;

class searchController extends Controller
{

  protected $url = 'https://fitzmuseum.cam.ac.uk/';

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

  public function staff()
  {
    $api = $this->getApi();
    $api->setEndpoint('staff_profiles');
    $api->setArguments(
      $args = array(
          'limit' => '500',
          'fields' => 'id,display_name,biography,slug,profile_image.*'
      )
    );
    $profiles = $api->getData();
    $configSolr = \Config::get('solarium');
    $this->client = new Client(new Curl(), new EventDispatcher(), $configSolr);
    $update = $this->client->createUpdate();
    $documents = array();
    foreach($profiles['data'] as $profile)
    {
      $doc = $update->createDocument();
      $doc->id = $profile['id'] . '-staff';
      $doc->title = $profile['display_name'];
      $doc->description = strip_tags($profile['biography']);
      $doc->body = strip_tags($profile['biography']);
      $doc->slug = $profile['slug'];
      $doc->url = $this->url . 'research/staff-profiles/' . $profile['slug'];
      $doc->contentType = 'staffProfile';
      if(isset($profile['profile_image'])){
        $doc->thumbnail = $profile['profile_image']['data']['thumbnails'][5]['url'];
        $doc->image = $profile['profile_image']['data']['full_url'];
        $doc->searchImage = $profile['profile_image']['data']['thumbnails'][2]['url'];
      }
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
          'fields' => 'id,article_title,article_body,slug,publication_date,field_image.*'
      )
    );
    $profiles = $api->getData();
    $configSolr = \Config::get('solarium');
    $this->client = new Client(new Curl(), new EventDispatcher(),$configSolr);
    $update = $this->client->createUpdate();
    $documents = array();
    foreach($profiles['data'] as $profile)
    {
      $doc = $update->createDocument();
      $doc->id = $profile['id'] . '-news';
      $doc->title = $profile['article_title'];
      $doc->description = strip_tags($profile['article_body']);
      $doc->body = strip_tags($profile['article_body']);
      $doc->slug = $profile['slug'];
      $doc->url = $this->url . 'news/' . $profile['slug'];
      $doc->pubDate = $profile['publication_date'];
      if(isset($profile['field_image'])){
        $doc->thumbnail = $profile['field_image']['data']['thumbnails'][4]['url'];
        $doc->image = $profile['field_image']['data']['full_url'];
        $doc->searchImage = $profile['field_image']['data']['thumbnails'][2]['url'];
      }
      $doc->contentType = 'news';
      $documents[] = $doc;
    }

    // add the documents and a commit command to the update query
    $update->addDocuments($documents);
    $update->addCommit();
    // this executes the query and returns the result
    $result = $this->client->update($update);
  }

  public function stubs()
  {
    $api = $this->getApi();
    $api->setEndpoint('stubs_and_pages');
    $api->setArguments(
      $args = array(
          'limit' => '500',
          'fields' => 'id,section,title,body,slug,hero_image.*'
      )
    );
    $profiles = $api->getData();
    $configSolr = \Config::get('solarium');
    $this->client = new Client(new Curl(), new EventDispatcher(),$configSolr);
    $update = $this->client->createUpdate();
    $documents = array();
    foreach($profiles['data'] as $profile)
    {
      $doc = $update->createDocument();
      $doc->id = $profile['id'] . '-pages';
      $doc->title = $profile['title'];
      $doc->description = strip_tags($profile['body']);
      $doc->body = strip_tags($profile['body']);
      $doc->slug = $profile['slug'];
      $doc->url = $this->url . implode('/', array($profile['section'], $profile['slug']));
      $doc->contentType = 'page';
      if(isset($profile['hero_image'])){
        $doc->thumbnail = $profile['hero_image']['data']['thumbnails'][4]['url'];
        $doc->image = $profile['hero_image']['data']['full_url'];
        $doc->searchImage = $profile['hero_image']['data']['thumbnails'][2]['url'];
      }
      $documents[] = $doc;
    }
    // add the documents and a commit command to the update query
    $update->addDocuments($documents);
    $update->addCommit();
    // this executes the query and returns the result
    $result = $this->client->update($update);
  }

  public function researchprojects()
  {
    $api = $this->getApi();
    $api->setEndpoint('research_projects');
    $api->setArguments(
      $args = array(
          'limit' => '500',
          'fields' => 'id,title,project_overview,slug,hero_image.*'
      )
    );
    $profiles = $api->getData();
    $configSolr = \Config::get('solarium');
    $this->client = new Client(new Curl(), new EventDispatcher(),$configSolr);
    $update = $this->client->createUpdate();
    $documents = array();
    foreach($profiles['data'] as $profile)
    {
      $doc = $update->createDocument();
      $doc->id = $profile['id'] . '-research-projects';
      $doc->title = $profile['title'];
      $doc->description = strip_tags($profile['project_overview']);
      $doc->body = strip_tags($profile['project_overview']);
      $doc->slug = $profile['slug'];
      $doc->url = $this->url . 'research/projects/' . $profile['slug'];
      $doc->contentType = 'projects';
      if(isset($profile['hero_image'])){
        $doc->thumbnail = $profile['hero_image']['data']['thumbnails'][4]['url'];
        $doc->image = $profile['hero_image']['data']['full_url'];
        $doc->searchImage = $profile['hero_image']['data']['thumbnails'][2]['url'];
      }
      $documents[] = $doc;
    }
    // add the documents and a commit command to the update query
    $update->addDocuments($documents);
    $update->addCommit();
    // this executes the query and returns the result
    $result = $this->client->update($update);
  }

  public function galleries()
  {
    $api = $this->getApi();
    $api->setEndpoint('galleries');
    $api->setArguments(
      $args = array(
          'limit' => '500',
          'fields' => 'id,gallery_name,gallery_description,slug,hero_image.*'
      )
    );
    $profiles = $api->getData();
    $configSolr = \Config::get('solarium');
    $this->client = new Client(new Curl(), new EventDispatcher(),$configSolr);
    $update = $this->client->createUpdate();
    $documents = array();
    foreach($profiles['data'] as $profile)
    {
      $doc = $update->createDocument();
      $doc->id = $profile['id'] . '-galleries';
      $doc->title = $profile['gallery_name'];
      $doc->description = strip_tags($profile['gallery_description']);
      $doc->body = strip_tags($profile['gallery_description']);
      $doc->slug = $profile['slug'];
      $doc->url = $this->url . 'visit-us/galleries/' . $profile['slug'];
      $doc->contentType = 'gallery';
      if(isset($profile['hero_image'])){
        $doc->thumbnail = $profile['hero_image']['data']['thumbnails'][5]['url'];
        $doc->image = $profile['hero_image']['data']['full_url'];
        $doc->searchImage = $profile['hero_image']['data']['thumbnails'][2]['url'];
      }
      $documents[] = $doc;
    }
    // add the documents and a commit command to the update query
    $update->addDocuments($documents);
    $update->addCommit();
    // this executes the query and returns the result
    $result = $this->client->update($update);
  }


  public function collections()
  {
    $api = $this->getApi();
    $api->setEndpoint('collections');
    $api->setArguments(
      $args = array(
          'limit' => '500',
          'fields' => 'id,collection_name,collection_description,slug,hero_image.*'
      )
    );
    $profiles = $api->getData();
    $configSolr = \Config::get('solarium');
    $this->client = new Client(new Curl(), new EventDispatcher(),$configSolr);
    $update = $this->client->createUpdate();
    $documents = array();
    foreach($profiles['data'] as $profile)
    {
      $doc = $update->createDocument();
      $doc->id = $profile['id'] . '-collections';
      $doc->title = $profile['collection_name'];
      $doc->description = strip_tags($profile['collection_description']);
      $doc->body = strip_tags($profile['collection_description']);
      $doc->slug = $profile['slug'];
      $doc->url = $this->url . 'about-us/collections/' . $profile['slug'];
      $doc->contentType = 'collection';
      if(isset($profile['hero_image'])){
        $doc->thumbnail = $profile['hero_image']['data']['thumbnails'][5]['url'];
        $doc->image = $profile['hero_image']['data']['full_url'];
        $doc->searchImage = $profile['hero_image']['data']['thumbnails'][2]['url'];
      }
      $documents[] = $doc;
    }
    // add the documents and a commit command to the update query
    $update->addDocuments($documents);
    $update->addCommit();
    // this executes the query and returns the result
    $result = $this->client->update($update);
  }

  public function lookthinkdo()
  {
    $api = $this->getApi();
    $api->setEndpoint('look_think_do');
    $api->setArguments(
      $args = array(
          'limit' => '500',
          'fields' => 'id,title_of_work,main_text_description,slug,focus_image.*'
      )
    );
    $profiles = $api->getData();
    $configSolr = \Config::get('solarium');
    $this->client = new Client(new Curl(), new EventDispatcher(),$configSolr);
    $update = $this->client->createUpdate();
    $documents = array();
    foreach($profiles['data'] as $profile)
    {
      $doc = $update->createDocument();
      $doc->id = $profile['id'] . '-lookthinkdo';
      $doc->title = $profile['title_of_work'];
      $doc->description = strip_tags($profile['main_text_description']);
      $doc->body = strip_tags($profile['main_text_description']);
      $doc->slug = $profile['slug'];
      $doc->url = $this->url . 'learning/look-think-do/' . $profile['slug'];
      $doc->contentType = 'learning';
      if(isset($profile['focus_image'])){
        $doc->thumbnail = $profile['focus_image']['data']['thumbnails'][5]['url'];
        $doc->image = $profile['focus_image']['data']['full_url'];
        $doc->searchImage = $profile['focus_image']['data']['thumbnails'][2]['url'];
      }
      $documents[] = $doc;
    }
    // add the documents and a commit command to the update query
    $update->addDocuments($documents);
    $update->addCommit();
    // this executes the query and returns the result
    $result = $this->client->update($update);
  }


  public function highlights()
  {
    $api = $this->getApi();
    $api->setEndpoint('pharos');
    $api->setArguments(
      $args = array(
          'limit' => '500',
          'fields' => 'id,title,description,slug,image.*'
      )
    );
    $profiles = $api->getData();
    $configSolr = \Config::get('solarium');
    $this->client = new Client(new Curl(), new EventDispatcher(),$configSolr);
    $update = $this->client->createUpdate();
    $documents = array();
    foreach($profiles['data'] as $profile)
    {
      $doc = $update->createDocument();
      $doc->id = $profile['id'] . '-pharos';
      $doc->title = $profile['title'];
      $doc->description = strip_tags($profile['description']);
      $doc->body = strip_tags($profile['description']);
      $doc->slug = $profile['slug'];
      $doc->url = $this->url . 'objects-and-artworks/highlights/' . $profile['slug'];
      $doc->contentType = 'pharos';

      if(isset($profile['image'])){
        $doc->thumbnail = $profile['image']['data']['thumbnails'][5]['url'];
        $doc->image = $profile['image']['data']['full_url'];
        $doc->smallimage = $profile['image']['data']['thumbnails']['4']['url'];
        $doc->searchImage = $profile['image']['data']['thumbnails'][2]['url'];
      }
      $documents[] = $doc;
    }
    // add the documents and a commit command to the update query
    $update->addDocuments($documents);
    $update->addCommit();
    // this executes the query and returns the result
    $result = $this->client->update($update);
  }

  public function pressroom()
  {
    $api = $this->getApi();
    $api->setEndpoint('pressroom_files');
    $api->setArguments(
      $args = array(
          'limit' => '500',
          'fields' => 'id,title,body,file.type,file.filesize,file.data,hero_image.*'
      )
    );
    $profiles = $api->getData();

    $configSolr = \Config::get('solarium');
    $this->client = new Client( new Curl(), new EventDispatcher(), $configSolr);
    $update = $this->client->createUpdate();
    $documents = array();
    foreach($profiles['data'] as $profile)
    {
      $doc = $update->createDocument();
      $doc->id = $profile['id'] . '-press';
      $doc->title = $profile['title'];
      $doc->description = strip_tags($profile['body']);
      $doc->body = strip_tags($profile['body']);
      $doc->url = $profile['file']['data']['url'];
      $doc->mimetype = $profile['file']['type'];
      $doc->filesize = $profile['file']['filesize'];
      $doc->contentType = 'pressroom';
      if(isset($profile['hero_image'])){
        $doc->thumbnail = $profile['hero_image']['data']['thumbnails'][5]['url'];
        $doc->image = $profile['hero_image']['data']['full_url'];
        $doc->searchImage = $profile['hero_image']['data']['thumbnails'][2]['url'];
      }
      $documents[] = $doc;
    }
    // add the documents and a commit command to the update query
    $update->addDocuments($documents);
    $update->addCommit();
    // this executes the query and returns the result
    $result = $this->client->update($update);
  }

  public function departments()
  {
    $api = $this->getApi();
    $api->setEndpoint('departments');
    $api->setArguments(
      $args = array(
          'limit' => '500',
          'fields' => 'id,title,department_description,slug,hero_image.*'
      )
    );
    $profiles = $api->getData();
    $configSolr = \Config::get('solarium');
    $this->client = new Client(new Curl(), new EventDispatcher(), $configSolr);
    $update = $this->client->createUpdate();
    $documents = array();
    foreach($profiles['data'] as $profile)
    {
      $doc = $update->createDocument();
      $doc->id = $profile['id'] . '-departments';
      $doc->title = $profile['title'];
      $doc->description = strip_tags($profile['department_description']);
      $doc->body = strip_tags($profile['department_description']);
      $doc->slug = $profile['slug'];
      $doc->url = $this->url . 'about-us/departments/' . $profile['slug'];
      $doc->contentType = 'department';
      if(isset($profile['hero_image'])){
        $doc->thumbnail = $profile['hero_image']['data']['thumbnails'][5]['url'];
        $doc->image = $profile['hero_image']['data']['full_url'];
        $doc->searchImage = $profile['hero_image']['data']['thumbnails'][2]['url'];
      }
      $documents[] = $doc;
    }
    // add the documents and a commit command to the update query
    $update->addDocuments($documents);
    $update->addCommit();
    // this executes the query and returns the result
    $result = $this->client->update($update);
  }

  public function vacancies()
  {
    $api = $this->getApi();
    $api->setEndpoint('vacancies');
    $api->setArguments(
      $args = array(
          'fields' => 'id,job_title,job_description,slug,hero_image.*'
      )
    );
    $vacancies = $api->getData();
    $configSolr = \Config::get('solarium');
    $this->client = new Client(new Curl(), new EventDispatcher(), $configSolr);
    $update = $this->client->createUpdate();
    $documents = array();
    foreach($vacancies['data'] as $vacancy)
    {
      $doc = $update->createDocument();
      $doc->id = $profile['id'] . '-vacancy';
      $doc->title = $profile['job_title'];
      $doc->description = strip_tags($vacancy['job_description']);
      $doc->body = strip_tags($vacancy['job_description']);
      $doc->slug = $vacancy['slug'];
      $doc->url = $this->url . 'about-us/vacancies/details/' . $vacancy['slug'];
      $doc->contentType = 'vacancies';
      if(isset($vacancy['hero_image'])){
        $doc->thumbnail = $vacancy['hero_image']['data']['thumbnails'][5]['url'];
        $doc->image = $vacancy['hero_image']['data']['full_url'];
        $doc->searchImage = $vacancy['hero_image']['data']['thumbnails'][2]['url'];
      }
      $documents[] = $doc;
    }
    // add the documents and a commit command to the update query
    $update->addDocuments($documents);
    $update->addCommit();
    // this executes the query and returns the result
    $result = $this->client->update($update);
  }

  public function directors()
  {
    $api = $this->getApi();
    $api->setEndpoint('directors');
    $api->setArguments(
      $args = array(
          'limit' => '500',
          'fields' => 'id,display_name,biography,slug,hero_image.*'
      )
    );
    $profiles = $api->getData();
    $configSolr = \Config::get('solarium');
    $this->client = new Client(new Curl(), new EventDispatcher(), $configSolr);
    $update = $this->client->createUpdate();
    $documents = array();
    foreach($profiles['data'] as $profile)
    {
      $doc = $update->createDocument();
      $doc->id = $profile['id'] . '-directors';
      $doc->title = $profile['display_name'];
      $doc->description = strip_tags($profile['biography']);
      $doc->body = strip_tags($profile['biography']);
      $doc->slug = $profile['slug'];
      $doc->url = $this->url . 'about-us/directors/' . $profile['slug'];
      $doc->contentType = 'director';
      if(isset($profile['hero_image'])){
        $doc->thumbnail = $profile['hero_image']['data']['thumbnails'][5]['url'];
        $doc->image = $profile['hero_image']['data']['full_url'];
        $doc->searchImage = $profile['hero_image']['data']['thumbnails'][2]['url'];
      }
      $documents[] = $doc;
    }
    // add the documents and a commit command to the update query
    $update->addDocuments($documents);
    $update->addCommit();
    // this executes the query and returns the result
    $result = $this->client->update($update);
  }

  public function themes()
  {
    $api = $this->getApi();
    $api->setEndpoint('themes');
    $api->setArguments(
      $args = array(
          'limit' => '500',
          'fields' => 'id,title,theme_description,slug,hero_image.*'
      )
    );
    $profiles = $api->getData();
    $configSolr = \Config::get(new Curl(), new EventDispatcher(), 'solarium');
    $this->client = new Client($configSolr);
    $update = $this->client->createUpdate();
    $documents = array();
    foreach($profiles['data'] as $profile)
    {
      $doc = $update->createDocument();
      $doc->id = $profile['id'] . '-themes';
      $doc->title = $profile['title'];
      $doc->description = strip_tags($profile['theme_description']);
      $doc->body = strip_tags($profile['theme_description']);
      $doc->slug = $profile['slug'];
      $doc->url = $this->url . 'themes/' . $profile['slug'];
      $doc->contentType = 'theme';
      if(isset($profile['hero_image'])){
        $doc->thumbnail = $profile['hero_image']['data']['thumbnails'][5]['url'];
        $doc->image = $profile['hero_image']['data']['full_url'];
        $doc->searchImage = $profile['hero_image']['data']['thumbnails'][2]['url'];
      }
      $documents[] = $doc;
    }
    // add the documents and a commit command to the update query
    $update->addDocuments($documents);
    $update->addCommit();
    // this executes the query and returns the result
    $result = $this->client->update($update);
  }

  public function pharospages()
  {
    $api = $this->getApi();
    $api->setEndpoint('pharos_pages');
    $api->setArguments(
      $args = array(
          'limit' => '500',
          'fields' => 'id,title,body,slug,section,hero_image.*'
      )
    );

    $profiles = $api->getData();
    $configSolr = \Config::get('solarium');
    $this->client = new Client(new Curl(), new EventDispatcher(), $configSolr);
    $update = $this->client->createUpdate();
    $documents = array();
    foreach($profiles['data'] as $profile)
    {
      $doc = $update->createDocument();
      $doc->id = $profile['id'] . '-pharos-pages';
      $doc->title = $profile['title'];
      $doc->description = strip_tags($profile['body']);
      $doc->body = strip_tags($profile['body']);
      $doc->slug = $profile['slug'];
      $doc->section = $profile['section'];
      $doc->url = $this->url . 'objects-and-artworks/highlights/context/'.  $profile['section'] . '/' . $profile['slug'];
      $doc->contentType = 'pharospages';
      if(isset($profile['hero_image'])){
        $doc->thumbnail = $profile['hero_image']['data']['thumbnails'][5]['url'];
        $doc->image = $profile['hero_image']['data']['full_url'];
        $doc->searchImage = $profile['hero_image']['data']['thumbnails'][2]['url'];
        $doc->smallimage = $profile['hero_image']['data']['thumbnails']['4']['url'];
      }
      $documents[] = $doc;
    }
    // add the documents and a commit command to the update query
    $update->addDocuments($documents);
    $update->addCommit();
    // this executes the query and returns the result
    $result = $this->client->update($update);
  }

  public function floor()
  {
    $api = $this->getApi();
    $api->setEndpoint('floorplans_guides');
    $api->setArguments(
      $args = array(
          'limit' => '500',
          'fields' => 'id,title,description,file.type,file.filesize,file.data,'
      )
    );
    $profiles = $api->getData();

    $configSolr = \Config::get('solarium');
    $this->client = new Client(new Curl(), new EventDispatcher(), $configSolr);
    $update = $this->client->createUpdate();
    $documents = array();
    foreach($profiles['data'] as $profile)
    {
      $doc = $update->createDocument();
      $doc->id = $profile['id'] . '-floorplanGuides';
      $doc->title = $profile['title'];
      $doc->description = strip_tags($profile['description']);
      $doc->body = strip_tags($profile['description']);
      $doc->url = $profile['file']['data']['url'];
      $doc->mimetype = $profile['file']['type'];
      $doc->filesize = $profile['file']['filesize'];
      $doc->contentType = 'floorplanGuides';
      $documents[] = $doc;
    }
    // add the documents and a commit command to the update query
    $update->addDocuments($documents);
    $update->addCommit();
    // this executes the query and returns the result
    $result = $this->client->update($update);
  }

  public function governance()
  {
    $api = $this->getApi();
    $api->setEndpoint('governance_files');
    $api->setArguments(
      $args = array(
          'limit' => '500',
          'fields' => 'id,title,file.type,file.filesize,file.data,'
      )
    );
    $profiles = $api->getData();

    $configSolr = \Config::get('solarium');
    $this->client = new Client(new Curl(), new EventDispatcher(), $configSolr);
    $update = $this->client->createUpdate();
    $documents = array();
    foreach($profiles['data'] as $profile)
    {
      $doc = $update->createDocument();
      $doc->id = $profile['id'] . '-governance';
      $doc->title = $profile['title'];
      $doc->description = strip_tags($profile['title']);
      $doc->body = strip_tags($profile['title']);
      $doc->url = $profile['file']['data']['url'];
      $doc->mimetype = $profile['file']['type'];
      $doc->filesize = $profile['file']['filesize'];
      $doc->contentType = 'governance';
      $documents[] = $doc;
    }
    // add the documents and a commit command to the update query
    $update->addDocuments($documents);
    $update->addCommit();
    // this executes the query and returns the result
    $result = $this->client->update($update);
  }

  public function learningfiles()
  {
    $api = $this->getApi();
    $api->setEndpoint('learning_files');
    $api->setArguments(
      $args = array(
          'limit' => '500',
          'fields' => 'id,title,type,curriculum_area,keystages,file.type,file.filesize,file.data,'
      )
    );
    $profiles = $api->getData();
    $configSolr = \Config::get('solarium');
    $this->client = new Client(new Curl(), new EventDispatcher(), $configSolr);
    $update = $this->client->createUpdate();
    $documents = array();
    foreach($profiles['data'] as $profile)
    {
      $doc = $update->createDocument();
      $doc->id = $profile['id'] . '-learningfiles';
      $doc->title = $profile['title'];
      $doc->description = strip_tags($profile['title']);
      $doc->body = strip_tags($profile['title']);
      $doc->url = $profile['file']['data']['url'];
      $doc->mimetype = $profile['file']['type'];
      $doc->filesize = $profile['file']['filesize'];
      $doc->keystages = $profile['keystages'];
      $doc->learningfiletype = $profile['type'];
      $doc->contentType = 'learning_files';
      $doc->curriculum_area = $profile['curriculum_area'];
      $documents[] = $doc;
    }

    // add the documents and a commit command to the update query
    $update->addDocuments($documents);
    $update->addCommit();
    // this executes the query and returns the result
    $result = $this->client->update($update);
  }
  public function exhibitions()
  {
    $api = $this->getApi();
    $api->setEndpoint('exhibitions');
    $api->setArguments(
      $args = array(
          'limit' => '500',
          'fields' => 'id,exhibition_title,exhibition_narrative,slug,hero_image.*'
      )
    );
    $profiles = $api->getData();
    $configSolr = \Config::get('solarium');
    $this->client = new Client(new Curl(), new EventDispatcher(), $configSolr);
    $update = $this->client->createUpdate();
    $documents = array();
    foreach($profiles['data'] as $profile)
    {
      $doc = $update->createDocument();
      $doc->id = $profile['id'] . '-exhibitions';
      $doc->title = $profile['exhibition_title'];
      $doc->description = strip_tags($profile['exhibition_narrative']);
      $doc->body = strip_tags($profile['exhibition_narrative']);
      $doc->slug = $profile['slug'];
      $doc->url = $this->url . 'visit-us/exhibitions/' . $profile['slug'];
      $doc->contentType = 'exhibitions';
      if(isset($profile['hero_image'])){
        $doc->thumbnail = $profile['hero_image']['data']['thumbnails'][5]['url'];
        $doc->image = $profile['hero_image']['data']['full_url'];
        $doc->smallimage = $profile['hero_image']['data']['thumbnails']['4']['url'];
        $doc->searchImage = $profile['hero_image']['data']['thumbnails'][2]['url'];
      }
      $documents[] = $doc;
    }
    // add the documents and a commit command to the update query
    $update->addDocuments($documents);
    $update->addCommit();
    // this executes the query and returns the result
    $result = $this->client->update($update);
  }

  public function instagram()
  {
    $expires = now()->addMinutes(6000);

    $instagram = new Instagram();
    $medias = $instagram->getPaginateMedias('fitzmuseum_uk');

    dd($medias);

    if (Cache::has('cache_insta_search')) {
      $insta = Cache::get('cache_insta_search');
    } else {
      $instagram = new Instagram();
      $insta = $instagram->getMedias('fitzmuseum_uk', 300);
    Cache::put('cache_insta_search', $insta, $expires); // 1 hour
    }
    $configSolr = \Config::get('solarium');
    $this->client = new Client(new Curl(), new EventDispatcher(), $configSolr);
    $update = $this->client->createUpdate();
    $documents = array();
    foreach($insta as $gram)
    {
      $doc = $update->createDocument();
      $doc->id = md5($gram->getId());
      $doc->title = substr(strip_tags(htmlspecialchars_decode($gram->getCaption())),0,150);
      $doc->description = strip_tags($gram->getCaption());
      $doc->body =strip_tags($gram->getCaption());
      $doc->url = $gram->getLink();
      $doc->contentType = 'instagram-'. $gram->getType();
      $doc->thumbnail = $gram->getImageThumbnailUrl();
      $doc->image = $gram->getImageHighResolutionUrl();
      $doc->searchImage = $gram->getImageThumbnailUrl();
      $documents[] = $doc;
    }
    // add the documents and a commit command to the update query
    $update->addDocuments($documents);
    $update->addCommit();
    // this executes the query and returns the result
    $result = $this->client->update($update);
  }

  public function audio()
  {
    $api = $this->getApi();
    $api->setEndpoint('audio_guide');
    $api->setArguments(
      $args = array(
          'limit' => '500',
          'fields' => 'id,title,stop_number,transcription,slug,hero_image.*'
      )
    );
    $profiles = $api->getData();

    $configSolr = \Config::get('solarium');
    $this->client = new Client(new Curl(), new EventDispatcher(), $configSolr);
    $update = $this->client->createUpdate();
    $documents = array();
    foreach($profiles['data'] as $profile)
    {
      $doc = $update->createDocument();
      $doc->id = $profile['id'] . '-audioguide';
      $doc->title = $profile['stop_number'] . ': ' . $profile['title'];
      $doc->description = strip_tags($profile['transcription']);
      $doc->body = strip_tags($profile['transcription']);
      $doc->url = $this->url . 'objects-and-artworks/audio-guide/' . $profile['slug'];
      $doc->slug = $profile['slug'];
      if(isset($profile['hero_image'])){
        $doc->thumbnail = $profile['hero_image']['data']['thumbnails'][5]['url'];
        $doc->image = $profile['hero_image']['data']['full_url'];
        $doc->searchImage = $profile['hero_image']['data']['thumbnails'][2]['url'];
      }
      $doc->contentType = 'audioguide';
      $documents[] = $doc;
    }
    // add the documents and a commit command to the update query
    $update->addDocuments($documents);
    $update->addCommit();
    // this executes the query and returns the result
    $result = $this->client->update($update);
  }

  public function sessions()
  {
    $api = $this->getApi();
    $api->setEndpoint('school_sessions');
    $api->setArguments(
      $args = array(
          'limit' => '30',
          'fields' => 'id,title,description,format_session,quote,key_stages,theme,session_type,slug,type_of_activity,curriculum_link,hero_image.*'
      )
    );
    $profiles = $api->getData();

    $configSolr = \Config::get('solarium');
    $this->client = new Client(new Curl(), new EventDispatcher(), $configSolr);
    $update = $this->client->createUpdate();
    $documents = array();
    foreach($profiles['data'] as $profile)
    {
      $doc = $update->createDocument();
      $doc->id = $profile['id'] . '-school_sessions';
      $doc->title = $profile['title'];
      $description = $profile['description'] . ' ' . $profile['quote'] . ' ' . $profile['format_session'];
      $doc->description = strip_tags($description);
      $doc->body = strip_tags($description);
      $doc->url = $this->url . 'learning/school-sessions/' . $profile['slug'];
      $doc->slug = $profile['slug'];
      if(isset($profile['key_stages'])){
        $doc->keystages = $profile['key_stages'];
      }
      if(isset($profile['theme'])){
        $doc->theme = $profile['theme'];
      }
      if(isset($profile['session_type'])){
        $doc->session_type = $profile['session_type'];
      }
      if(isset($profile['type_of_activity'])){
        $doc->type_of_activity = $profile['type_of_activity'];
      }
      if(isset($profile['curriculum_link'])){
        $doc->curriculum_link = $profile['curriculum_link'];
      }
      if(isset($profile['hero_image'])){
        $doc->thumbnail = $profile['hero_image']['data']['thumbnails'][4]['url'];
        $doc->image = $profile['hero_image']['data']['full_url'];
        $doc->searchImage = $profile['hero_image']['data']['thumbnails'][2]['url'];
      }
      $doc->contentType = 'schoolsessions';
      $documents[] = $doc;
    }
    // add the documents and a commit command to the update query
    $update->addDocuments($documents);
    $update->addCommit();
    // this executes the query and returns the result
    $result = $this->client->update($update);
  }


  public function getShopifyObjects()
  {
    $config = array(
    'ShopUrl' => env('SHOPIFY_FME_URL'),
    'ApiKey' => env('SHOPIFY_FME_API_KEY'),
    'Password' => env('SHOPIFY_FME_API_PASSWORD'),
    );
    $shop = new ShopifySDK;
    $shop->config($config);
    $lastId = 1;
    return $shop->Product->get(['limit' => 250, 'since_id' => $lastId, 'status' => 'active']);
  }

  public function shopifyRefresh()
  {
    $configSolr = \Config::get('solarium');
    $client = new Client(new Curl(), new EventDispatcher(),$configSolr);
    $delete = $client->createUpdate();
    $delete->addDeleteQuery('contentType:shopify');
    $delete->addCommit();
    return $client->update($delete);
  }

  public function sessionsRefresh()
  {
    $configSolr = \Config::get('solarium');
    $client = new Client(new Curl(), new EventDispatcher(),$configSolr);
    $delete = $client->createUpdate();
    $delete->addDeleteQuery('contentType:schoolsessions');
    $delete->addCommit();
    return $client->update($delete);
  }


  public function shopify()
  {
    $configSolr = \Config::get('solarium');
    $client = new Client(new Curl(), new EventDispatcher(),$configSolr);
    $update = $client->createUpdate();
    $documents = array();

    $shopify = $this->getShopifyObjects();
    $url = env('SHOPIFY_FME_URL');
    $shop = env('SHOPIFY_FME_LIVE_URL');
    $protocol = env('SHOPIFY_FME_PROTOCOL');
    $catalogue = env('SHOPIFY_FME_CATALOGUE');
    foreach($shopify as $product) {
      dump($product);
      $doc = $update->createDocument();
      $doc->id = $product['id'];
      $doc->title = $product['title'];
      $description = $product['body_html'];
      $doc->description = strip_tags($description);
      $doc->body = strip_tags($description);
      $doc->url = $protocol . $shop . $catalogue . $product['handle'];
      $doc->slug = $product['handle'];
      $doc->vendor = $product['vendor'];
      if(array_key_exists('image', $product)){
        // dump($product['image']);
        $doc->thumbnail = $product['image']['src'];
        $doc->image = $product['image']['src'];
        $doc->searchImage = $product['image']['src'];
      }
      $doc->price = $product['variants'][0]['price'];
      $doc->contentType = 'shopify';
      $documents[] = $doc;

    }
    $update->addDocuments($documents);
    $update->addCommit();
    return $result = $client->update($update);
  }




  public function podcasts()
  {
    $api = $this->getApi();
    $api->setEndpoint('podcast_archive');
    $api->setArguments(
      $args = array(
          'limit' => '500',
          'fields' => 'id,title,description,slug,hero_image.*'
      )
    );
    $profiles = $api->getData();

    $configSolr = \Config::get('solarium');
    $this->client = new Client(new Curl(), new EventDispatcher(),$configSolr);
    $update = $this->client->createUpdate();
    $documents = array();
    foreach($profiles['data'] as $profile)
    {
      $doc = $update->createDocument();
      $doc->id = $profile['id'] . '-podcastsarchive';
      $doc->title = $profile['title'];
      $doc->description = strip_tags($profile['description']);
      $doc->body = strip_tags($profile['description']);
      $doc->url = $this->url . 'conversations/podcasts/episode/' . $profile['slug'];
      $doc->slug = $profile['slug'];
      if(isset($profile['hero_image'])){
        $doc->thumbnail = $profile['hero_image']['data']['thumbnails'][5]['url'];
        $doc->image = $profile['hero_image']['data']['full_url'];
        $doc->searchImage = $profile['hero_image']['data']['thumbnails'][2]['url'];
      }
      $doc->contentType = 'podcasts';
      $documents[] = $doc;
    }
    // add the documents and a commit command to the update query
    $update->addDocuments($documents);
    $update->addCommit();
    // this executes the query and returns the result
    $result = $this->client->update($update);
  }

  public function podcastseries()
  {
    $api = $this->getApi();
    $api->setEndpoint('podcast_series');
    $api->setArguments(
      $args = array(
          'limit' => '50',
          'fields' => 'id,title,slug,cover_image.*'
      )
    );
    $profiles = $api->getData();

    $configSolr = \Config::get('solarium');
    $this->client = new Client(new Curl(), new EventDispatcher(), $configSolr);
    $update = $this->client->createUpdate();
    $documents = array();
    foreach($profiles['data'] as $profile)
    {
      $doc = $update->createDocument();
      $doc->id = $profile['id'] . '-podcast_series';
      $doc->title = $profile['title'];
      $doc->description = strip_tags($profile['title']);
      $doc->body = strip_tags($profile['title']);
      $doc->url = $this->url . 'conversations/podcasts/' . $profile['slug'];
      $doc->slug = $profile['slug'];
      if(isset($profile['cover_image'])){
        $doc->thumbnail = $profile['cover_image']['data']['thumbnails'][5]['url'];
        $doc->image = $profile['cover_image']['data']['full_url'];
        $doc->searchImage = $profile['cover_image']['data']['thumbnails'][2]['url'];
      }
      $doc->contentType = 'podcast_series';
      $documents[] = $doc;
    }
    // add the documents and a commit command to the update query
    $update->addDocuments($documents);
    $update->addCommit();
    // this executes the query and returns the result
    $result = $this->client->update($update);
  }

  public function mindseye()
  {
    $api = $this->getApi();
    $api->setEndpoint('mindseye');
    $api->setArguments(
      $args = array(
          'limit' => '10',
          'fields' => 'id,title,story,slug,hero_image.*',
          'filter[publish_time][lte]' => 'now'
      )
    );

    $profiles = $api->getData();

    $configSolr = \Config::get('solarium');
    $this->client = new Client(new Curl(), new EventDispatcher(),$configSolr);
    $update = $this->client->createUpdate();
    $documents = array();
    foreach($profiles['data'] as $profile)
    {
      $doc = $update->createDocument();
      $doc->id = $profile['id'] . '-mindseye';
      $doc->title = $profile['title'];
      $doc->description = strip_tags($profile['story']);
      $doc->body = strip_tags($profile['story']);
      $doc->url = $this->url . 'conversations/podcasts/in-my-minds-eye/' . $profile['slug'];
      $doc->slug = $profile['slug'];
      if(isset($profile['hero_image'])){
        $doc->thumbnail = $profile['hero_image']['data']['thumbnails'][5]['url'];
        $doc->image = $profile['hero_image']['data']['full_url'];
        $doc->searchImage = $profile['hero_image']['data']['thumbnails'][2]['url'];
      }
      $doc->contentType = 'podcasts';
      $documents[] = $doc;
    }
    // add the documents and a commit command to the update query
    $update->addDocuments($documents);
    $update->addCommit();
    // this executes the query and returns the result
    $result = $this->client->update($update);
  }
}
