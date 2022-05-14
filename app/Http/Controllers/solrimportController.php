<?php

namespace App\Http\Controllers;

use App\SolrImporter;
use Config;
use Illuminate\Support\Str;
use PHPShopify\Exception\ApiException;
use PHPShopify\Exception\CurlException;
use Solarium\Client;
use Solarium\Core\Client\Adapter\Curl;
use Solarium\Core\Query\Result\ResultInterface;
use Solarium\QueryType\Update\Result;
use Symfony\Component\EventDispatcher\EventDispatcher;

class solrimportController extends Controller
{
    /**
     * @return ResultInterface|Result
     */
    public function staff(): Result|ResultInterface
    {
        $api = $this->getApi();
        $api->setEndpoint('staff_profiles');
        $api->setArguments(
            array(
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

    /**
     * @return ResultInterface|Result
     */
    public function affiliates(): Result|ResultInterface
    {
        $api = $this->getApi();
        $api->setEndpoint('affiliate_researchers');
        $api->setArguments(
            array(
                'limit' => '500',
                'fields' => 'id,display_name,biography,slug,profile_image.*'
            )
        );
        $data = $api->getData();
        $solr = new SolrImporter();
        return $solr->import(
            $data['data'],
            'affiliateProfile',
            'affiliateProfile',
            'research-affiliate',
            array('slug'),
            array('title' => 'display_name', 'content' => 'biography', 'image' => 'profile_image')
        );
    }

    /**
     * @return ResultInterface|Result
     */
    public function news(): Result|ResultInterface
    {
        $api = $this->getApi();
        $api->setEndpoint('news_articles');
        $api->setArguments(
            array(
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

    /**
     * @return ResultInterface|Result
     */
    public function stubs(): Result|ResultInterface
    {
        $api = $this->getApi();
        $api->setEndpoint('stubs_and_pages');
        $api->setArguments(
            array(
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
            array('section', 'slug'),
            array('title' => 'title', 'content' => 'body')
        );
    }

    /**
     * @return ResultInterface|Result
     */
    public function researchprojects(): Result|ResultInterface
    {
        $api = $this->getApi();
        $api->setEndpoint('research_projects');
        $api->setArguments(
            array(
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

    /**
     * @return ResultInterface|Result
     */
    public function galleries(): Result|ResultInterface
    {
        $api = $this->getApi();
        $api->setEndpoint('galleries');
        $api->setArguments(
            array(
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

    /**
     * @return ResultInterface|Result
     */
    public function collections(): Result|ResultInterface
    {
        $api = $this->getApi();
        $api->setEndpoint('collections');
        $api->setArguments(
            array(
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

    /**
     * @return ResultInterface|Result
     */
    public function lookthinkdo(): Result|ResultInterface
    {
        $api = $this->getApi();
        $api->setEndpoint('look_think_do');
        $api->setArguments(
            array(
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

    /**
     * @return ResultInterface|Result
     */
    public function highlights(): Result|ResultInterface
    {
        $api = $this->getApi();
        $api->setEndpoint('pharos');
        $api->setArguments(
            array(
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

    /**
     * @return ResultInterface|Result
     */
    public function pressroom(): Result|ResultInterface
    {
        $api = $this->getApi();
        $api->setEndpoint('pressroom_files');
        $api->setArguments(
            array(
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

    /**
     * @return ResultInterface|Result
     */
    public function departments(): Result|ResultInterface
    {
        $api = $this->getApi();
        $api->setEndpoint('departments');
        $api->setArguments(
            array(
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

    /**
     * @return ResultInterface|Result
     */
    public function vacancies(): Result|ResultInterface
    {
        $api = $this->getApi();
        $api->setEndpoint('vacancies');
        $api->setArguments(
            array(
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

    /**
     * @return ResultInterface|Result
     */
    public function directors(): Result|ResultInterface
    {
        $api = $this->getApi();
        $api->setEndpoint('directors');
        $api->setArguments(
            array(
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

    /**
     * @return ResultInterface|Result
     */
    public function pharospages(): Result|ResultInterface
    {
        $api = $this->getApi();
        $api->setEndpoint('pharos_pages');
        $api->setArguments(
            array(
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
            array('section', 'slug'),
            array('title' => 'title', 'content' => 'body')
        );
    }

    /**
     * @return ResultInterface|Result
     */
    public function floor(): Result|ResultInterface
    {
        $api = $this->getApi();
        $api->setEndpoint('floorplans_guides');
        $api->setArguments(
            array(
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

    /**
     * @return ResultInterface|Result
     */
    public function governance(): Result|ResultInterface
    {
        $api = $this->getApi();
        $api->setEndpoint('governance_files');
        $api->setArguments(
            array(
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

    /**
     * @return ResultInterface|Result
     */
    public function learningfiles(): Result|ResultInterface
    {
        $api = $this->getApi();
        $api->setEndpoint('learning_files');
        $api->setArguments(
            array(
                'limit' => '500',
                'fields' => 'id,title,type,curriculum_area,key_stage,keystages,file.type,file.filesize,file.data,'
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

    /**
     * @return ResultInterface|Result
     */
    public function exhibitions(): Result|ResultInterface
    {
        $api = $this->getApi();
        $api->setEndpoint('exhibitions');
        $api->setArguments(
            array(
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

    /**
     * @return ResultInterface|Result
     */
    public function audio(): Result|ResultInterface
    {
        $api = $this->getApi();
        $api->setEndpoint('audio_guide');
        $api->setArguments(
            array(
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

    /**
     * @return ResultInterface|Result
     */
    public function sessions(): Result|ResultInterface
    {
        $api = $this->getApi();
        $api->setEndpoint('school_sessions');
        $api->setArguments(
            array(
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
            array('title' => 'title', 'content' => 'description',)
        );

    }

    /**
     * @return ResultInterface|Result
     */
    public function shopifyRefresh(): Result|ResultInterface
    {
        $configSolr = Config::get('solarium');
        $client = new Client(new Curl(), new EventDispatcher(), $configSolr);
        $delete = $client->createUpdate();
        $delete->addDeleteQuery('contentType:shopify');
        $delete->addCommit();
        return $client->update($delete);
    }

    /**
     * @return ResultInterface|Result
     */
    public function sessionsRefresh(): Result|ResultInterface
    {
        $configSolr = Config::get('solarium');
        $client = new Client(new Curl(), new EventDispatcher(), $configSolr);
        $delete = $client->createUpdate();
        $delete->addDeleteQuery('contentType:schoolsessions');
        $delete->addCommit();
        return $client->update($delete);
    }

    /**
     * @return ResultInterface|Result
     * @throws ApiException
     * @throws CurlException
     */
    public function shopify(): Result|ResultInterface
    {
        $solr = new SolrImporter();
        return $solr->shopify();
    }

    /**
     * @return ResultInterface|Result
     */
    public function podcasts(): Result|ResultInterface
    {
        $api = $this->getApi();
        $api->setEndpoint('podcast_archive');
        $api->setArguments(
            array(
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
            array('title' => 'title', 'content' => 'description')
        );
    }

    /**
     * @return ResultInterface|Result
     */
    public function podcastseries(): Result|ResultInterface
    {
        $api = $this->getApi();
        $api->setEndpoint('podcast_series');
        $api->setArguments(
            array(
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

    /**
     * @return ResultInterface|Result
     */
    public function mindseye(): Result|ResultInterface
    {
        $api = $this->getApi();
        $api->setEndpoint('mindseye');
        $api->setArguments(
            array(
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
            array('title' => 'title', 'content' => 'story')
        );
    }

    /**
     * @return ResultInterface|Result
     */
    public function resources(): Result|ResultInterface
    {
        $api = $this->getApi();
        $api->setEndpoint('online_resources');
        $api->setArguments(
            array(
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
            array('title' => 'title', 'content' => 'description')
        );
    }

    /**
     * @return ResultInterface|Result
     */
    public function ttnArtists(): Result|ResultInterface
    {
        $api = $this->getApi();
        $api->setEndpoint('ttn_artists');
        $api->setArguments(
            array(
                'limit' => '200',
                'fields' => 'id,display_name,biography,slug,image.*',
            )
        );
        $data = $api->getData();
        $solr = new SolrImporter();
        return $solr->import(
            $data['data'],
            'ttnArtists',
            'ttn_artists',
            'exhibition.ttn.artist',
            array('slug'),
            array('title' => 'display_name', 'content' => 'biography','image' => 'image')
        );
    }

    /**
     * @return ResultInterface|Result
     */
    public function ttnLabels(): Result|ResultInterface
    {
        $api = $this->getApi();
        $api->setEndpoint('ttn_labels');
        $api->setArguments(
            array(
                'limit' => '200',
                'fields' => 'id,title,slug,image.*',
            )
        );
        $data = $api->getData();
        $solr = new SolrImporter();
        return $solr->import(
            $data['data'],
            'ttnLabels',
            'ttn_labels',
            'exhibition.ttn.label',
            array('slug'),
            array('title' => 'title', 'content' => 'title','image' => 'image')
        );
    }

    /**
     * @return ResultInterface|Result
     */
    public function longform(): Result|ResultInterface
    {
        $api = $this->getApi();
        $api->setEndpoint('long_form');
        $api->setArguments(
            array(
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
            array(Str::slug('title')),
            array('title' => 'title', 'content' => 'description')
        );
    }

    /**
     * @return ResultInterface|Result
     */
    public function spoliation(): Result|ResultInterface
    {
        $api = $this->getApi();
        $api->setEndpoint('spoliation_claims');
        $api->setArguments(
            array(
                'limit' => '200',
                'fields' => 'id,alt_text,text,priref,image.*',
            )
        );
        $data = $api->getData();
        $solr = new SolrImporter();
        return $solr->import(
            $data['data'],
            'spoliation',
            'spoliation',
            'about.spoliation.claim',
            array('priref'),
            array('title' => 'alt_text', 'content' => 'text', 'image' => 'image')
        );
    }

    /**
     * @return ResultInterface|Result
     */
    public function viewpoints(): Result|ResultInterface
    {
        $api = $this->getApi();
        $api->setEndpoint('ttn_viewpoints');
        $api->setArguments(
            array(
                'fields' => '*.*.*.*'
            )
        );
        $data = $api->getData()['data'];
        $updateData = array();
        foreach ($data as $datum) {
            $updateData[] = array(
                'title' => $datum['title'],
                'viewpoint' => $datum['viewpoint'],
                'id' => $datum['id'],
                'image' => $datum['associated_artworks'][0]['ttn_labels_id']['image']
            );
        }
        $solr = new SolrImporter();
        return $solr->import(
            $updateData,
            'ttnViewpoints',
            'ttn_viewpoints',
            'exhibition.ttn.viewpoint',
            array('id'),
            array('title' => 'title', 'content' => 'viewpoint', 'image' => 'image')
        );
    }
}
