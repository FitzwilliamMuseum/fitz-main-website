<?php

namespace App\Http\Controllers;

use App\SolrImporter;
use App\DirectUs;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Str;
use PHPShopify\Exception\ApiException;
use PHPShopify\Exception\CurlException;
use Solarium\Client;
use Solarium\Core\Client\Adapter\Curl;
use Solarium\Core\Query\Result\ResultInterface;
use Solarium\QueryType\Update\Result;
use Symfony\Component\EventDispatcher\EventDispatcher;

class solrImportController extends Controller
{
    /**
     * @return ResultInterface|Result
     */
    public function staff(): Result|ResultInterface
    {
        $api = new DirectUs(
            'staff_profiles',
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
        $api = new DirectUs(
            'affiliate_researchers',
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
        $api = new DirectUs(
            'news_articles',
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
        $api = new DirectUs(
            'stubs_and_pages',
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
    public function researchProjects(): Result|ResultInterface
    {
        $api = new DirectUs(
            'research_projects',
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
        $api = new DirectUs(
            'galleries',
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
        $api = new DirectUs(
            'collections',
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
    public function lookThinkDo(): Result|ResultInterface
    {
        $api = new DirectUs(
            'look_think_do',
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
        $api = new DirectUs(
            'pharos',
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
        $api = new DirectUs(
            'pressroom_files',
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
        $api = new DirectUs(
            'departments',
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
        $api = new DirectUs(
            'vacancies',
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
        $api = new DirectUs(
            'directors',
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
    public function pharosPages(): Result|ResultInterface
    {
        $api = new DirectUs(
            'pharos_pages',
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
        $api = new DirectUs(
            'floorplans_guides',
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
        $api = new DirectUs(
            'governance_files',
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
    public function learningFiles(): Result|ResultInterface
    {
        $api = new DirectUs(
            'learning_files',
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
        $api = new DirectUs(
            'exhibitions',
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
        $api = new DirectUs(
            'audio_guide',
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
        $api = new DirectUs(
            'school_sessions',
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
    public function twitterPurge(): Result|ResultInterface
    {
        $configSolr = Config::get('solarium');
        $client = new Client(new Curl(), new EventDispatcher(), $configSolr);
        $delete = $client->createUpdate();
        $delete->addDeleteQuery('contentType:twitter');
        $delete->addCommit();
        return $client->update($delete);
    }

    /**
     * @return ResultInterface|Result
     */
    public function instagramPurge(): Result|ResultInterface
    {
        $configSolr = Config::get('solarium');
        $client = new Client(new Curl(), new EventDispatcher(), $configSolr);
        $delete = $client->createUpdate();
        $delete->addDeleteQuery('contentType:instagram');
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
     * Refresh the Solr index for staff profiles.
     *
     * @return Result|ResultInterface
     */
    public function staffRefresh(): Result|ResultInterface
    {
        $configSolr = Config::get('solarium');
        $client = new Client(new Curl(), new EventDispatcher(), $configSolr);
        $delete = $client->createUpdate();
        $delete->addDeleteQuery('contentType:staffProfile');
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
        $api = new DirectUs(
            'podcast_archive',
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
    public function podcastSeries(): Result|ResultInterface
    {
        $api = new DirectUs(
            'podcast_series',
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
        $api = new DirectUs(
            'mindseye',
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
        $api = new DirectUs(
            'online_resources',
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
        $api = new DirectUs(
            'ttn_artists',
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
        $api = new DirectUs(
            'ttn_labels',
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
        $api = new DirectUs(
            'long_form',
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
        $api = new DirectUs(
            'spoliation_claims',
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
        $api = new DirectUs(
            'ttn_viewpoints',
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
