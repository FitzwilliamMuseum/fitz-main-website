<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Solarium\Client;
use Solarium\Core\Client\Adapter\Curl;
use Symfony\Component\EventDispatcher\EventDispatcher;
use Solarium\Exception;
use Illuminate\Support\Str;

use Mews\Purifier;
use App\Directus;
use App\SolrImporter;
use GuzzleHttp;

class solrimportController extends Controller
{
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
    $data = $api->getData();
    $solr = new SolrImporter();
    return $solr->import(
      $data['data'],
      'staffProfile',
      'staffProfile',
      'research-profile',
      array('slug'),
      array('title' => 'display_name', 'content' => 'biography', 'image' => 'profile_image')
    );
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
    $data = $api->getData();
    $solr = new SolrImporter();
    return $solr->import(
      $data['data'],
      'news',
      'news',
      'article',
      array('slug'),
      array('title' => 'article_title', 'content' => 'article_body', 'image' => 'field_image')
    );
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
    $data = $api->getData();
    $solr = new SolrImporter();
    return $solr->import(
      $data['data'],
      'pages',
      'pages',
      'landing-section',
      array('section','slug'),
      array('title' => 'title', 'content' => 'body')
    );
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
    $data = $api->getData();
    $solr = new SolrImporter();
    return $solr->import(
      $data['data'],
      'research-projects',
      'research-projects',
      'research-project',
      array('slug'),
      array('title' => 'title', 'content' => 'project_overview')
    );
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
    $data = $api->getData();
    $solr = new SolrImporter();
    return $solr->import(
      $data['data'],
      'galleries',
      'gallery',
      'gallery',
      array('slug'),
      array('title' => 'gallery_name', 'content' => 'gallery_description')
    );
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
    $data = $api->getData();
    $solr = new SolrImporter();
    return $solr->import(
      $data['data'],
      'collections',
      'collection',
      'collection',
      array('slug'),
      array('title' => 'collection_name', 'content' => 'collection_description')
    );
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
    $data = $api->getData();
    $solr = new SolrImporter();
    return $solr->import(
      $data['data'],
      'lookthinkdo',
      'learning',
      'ltd-activity',
      array('slug'),
      array('title' => 'title_of_work', 'content' => 'main_text_description', 'image' => 'focus_image')
    );
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
    $data = $api->getData();
    $solr = new SolrImporter();
    return $solr->import(
      $data['data'],
      'highlights',
      'highlights',
      'highlight',
      array('slug'),
      array('title' => 'title', 'content' => 'description', 'image' => 'image')
    );
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
    $data = $api->getData();
    $solr = new SolrImporter();
    return $solr->import(
      $data['data'],
      'press',
      'pressroom',
      'highlight',
      array('title'),
      array(
        'title' => 'title',
        'content' => 'body',
        'image' => 'hero_image',
        'file' => 'file'
      )
    );
  }

  public function departments()
  {
    $api = $this->getApi();
    $api->setEndpoint('departments');
    $api->setArguments(
      $args = array(
        'limit' => '20',
        'fields' => 'id,title,department_description,slug,hero_image.*'
      )
    );
    $data = $api->getData();
    $solr = new SolrImporter();
    return $solr->import(
      $data['data'],
      'departments',
      'department',
      'department',
      array('slug'),
      array('title' => 'title', 'content' => 'department_description')
    );
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
    $data = $api->getData();
    $solr = new SolrImporter();
    return $solr->import(
      $data['data'],
      'vacancy',
      'vacancy',
      'vacancy',
      array('slug'),
      array('title' => 'job_title', 'content' => 'job_description')
    );
  }

  public function directors()
  {
    $api = $this->getApi();
    $api->setEndpoint('directors');
    $api->setArguments(
      $args = array(
        'limit' => '20',
        'fields' => 'id,display_name,biography,slug,hero_image.*'
      )
    );
    $data = $api->getData();
    $solr = new SolrImporter();
    return $solr->import(
      $data['data'],
      'directors',
      'directors',
      'director',
      array('slug'),
      array('title' => 'display_name', 'content' => 'biography')
    );
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
    $data = $api->getData();
    $solr = new SolrImporter();
    return $solr->import(
      $data['data'],
      'pharos-pages',
      'pharos-pages',
      'context-section-detail',
      array('section','slug'),
      array('title' => 'title', 'content' => 'body')
    );
  }

  public function floor()
  {
    $api = $this->getApi();
    $api->setEndpoint('floorplans_guides');
    $api->setArguments(
      $args = array(
        'limit' => '10',
        'fields' => 'id,title,description,file.type,file.filesize,file.data,'
      )
    );
    $data = $api->getData();
    $solr = new SolrImporter();
    return $solr->import(
      $data['data'],
      'floorplanGuides',
      'floorplanGuides',
      'highlight',
      array('title'),
      array(
        'title' => 'title',
        'content' => 'description',
        'file' => 'file'
      )
    );
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
    $data = $api->getData();
    $solr = new SolrImporter();
    return $solr->import(
      $data['data'],
      'governance',
      'governance',
      'highlight',
      array('title'),
      array(
        'title' => 'title',
        'content' => 'title',
        'file' => 'file'
      )
    );
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
    $data = $api->getData();
    $solr = new SolrImporter();
    return $solr->import(
      $data['data'],
      'learningfiles',
      'learning_files',
      'highlight',
      array('title'),
      array(
        'title' => 'title',
        'content' => 'title',
        'file' => 'file',
      )
    );
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
    $data = $api->getData();
    $solr = new SolrImporter();
    return $solr->import(
      $data['data'],
      'exhibitions',
      'exhibitions',
      'exhibition',
      array('slug'),
      array('title' => 'exhibition_title', 'content' => 'exhibition_narrative')
    );
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
    $data = $api->getData();
    $solr = new SolrImporter();
    return $solr->import(
      $data['data'],
      'audioguide',
      'audioguide',
      'audio-stop',
      array('slug'),
      array('title' => 'title', 'content' => 'transcription')
    );
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
    $data = $api->getData();
    $solr = new SolrImporter();
    return $solr->import(
      $data['data'],
      'school_sessions',
      'schoolsessions',
      'school-sessions',
      array('slug'),
      array('title' => 'title', 'content' => 'description', )
    );

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
    $solr = new SolrImporter();
    return $solr->shopify();
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
    $data = $api->getData();
    $solr = new SolrImporter();
    return $solr->import(
      $data['data'],
      'podcastsarchive',
      'podcasts',
      'podcasts.episode',
      array('slug'),
      array('title' => 'title', 'content' => 'story')
    );
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
    $data = $api->getData();
    $solr = new SolrImporter();
    return $solr->import(
      $data['data'],
      'podcast_series',
      'podcast_series',
      'podcasts.series',
      array('slug'),
      array('title' => 'title', 'content' => 'title', 'image' => 'cover_image')
    );
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
    $data = $api->getData();
    $solr = new SolrImporter();
    return $solr->import(
      $data['data'],
      'podcasts',
      'mindseye',
      'mindeyes.story',
      array('slug'),
      array('title'=> 'title', 'content' => 'story')
    );
  }

  public function resources()
  {
    $api = $this->getApi();
    $api->setEndpoint('online_resources');
    $api->setArguments(
      $args = array(
        'limit' => '200',
        'fields' => 'id,title,description,slug,hero_image.*',
      )
    );
    $data = $api->getData();
    $solr = new SolrImporter();
    return $solr->import(
      $data['data'],
      'resources',
      'resources',
      'resource',
      array('slug'),
      array('title'=> 'title', 'content' => 'description')
    );
  }

  public function longform()
  {
    $api = $this->getApi();
    $api->setEndpoint('long_form');
    $api->setArguments(
      $args = array(
        'limit' => '200',
        'fields' => 'id,title,description,hero_image.*',
      )
    );
    $data = $api->getData();
    $solr = new SolrImporter();
    return $solr->import(
      $data['data'],
      'longForm',
      'longForm',
      'resource',
      array(Str::slug('title','-')),
      array('title'=> 'title', 'content' => 'description')
    );
  }
}
