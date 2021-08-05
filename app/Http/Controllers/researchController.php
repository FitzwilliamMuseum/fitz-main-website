<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\MoreLikeThis;

class researchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     public function index()
     {
       $api = $this->getApi();
       $api->setEndpoint('stubs_and_pages');
       $api->setArguments(
         $args = array(
             'fields' => '*.*.*.*',
             'meta' => 'result_count,total_count,type',
             'filter[landing_page][eq]' => '1',
             'filter[section][eq]' => 'research',
         )
       );
       $pages = $api->getData();

       $apiRes = $this->getApi();
       $apiRes->setEndpoint('stubs_and_pages');
       $apiRes->setArguments(
         $args = array(
             'fields' => '*.*.*.*',
             'meta' => 'result_count,total_count,type',
             'filter[landing_page][null]' => '',
             'filter[section][eq]' => 'research',
             'filter[associate_with_landing_page][eq]' => '1'
         )
       );
       $associated = $apiRes->getData();
       return view('research.index', compact('pages', 'associated'));
     }

    public function projects()
    {
      $api = $this->getApi();
      $api->setEndpoint('research_projects');
      $api->setArguments(
        $args = array(
            'fields' => '*.*.*.*',
            'meta' => 'result_count,total_count,type',
            'sort' => 'title'
        )
      );
      $projects = $api->getData();

      return view('research.projects', compact('projects'));
    }

    public function project($slug)
    {
      $api = $this->getApi();
      $api->setEndpoint('research_projects');
      $api->setArguments(
        $args = array(
            'fields' => '*.*.*.*',
            'meta' => 'result_count,total_count,type',
            'filter[slug][eq]' => $slug
        )
      );
      $projects = $api->getData();
      if(empty($projects['data'])){
        return response()->view('errors.404',[],404);
      }
      $mlt = new MoreLikeThis;
      $mlt->setLimit(3)->setType('projects')->setQuery($slug);
      $records = $mlt->getData();
      return view('research.project', compact('projects', 'records'));
    }

    public function profiles()
    {
      $api = $this->getApi();
      $api->setEndpoint('staff_profiles');
      $api->setArguments(
        $args = array(
            'fields' => '*.*.*.*',
            'meta' => 'result_count,total_count,type',
            'sort' => 'last_name',
            'filter[research_active][in]' => 'yes'
        )
      );
      $profiles = $api->getData();
      return view('research.profiles', compact('profiles'));
    }

    public function profile($slug)
    {
      $api = $this->getApi();
      $api->setEndpoint('staff_profiles');
      $api->setArguments(
        $args = array(
            'fields' => '*.*.*.*',
            'meta' => '*',
            'filter[slug][eq]' => $slug
        )
      );
      $profiles = $api->getData();
      if(empty($profiles['data'])){
        return response()->view('errors.404',[],404);
      }
      return view('research.profile', compact('profiles'));
    }

    public function resource($slug)
    {
      $api = $this->getApi();
      $api->setEndpoint('online_resources');
      $api->setArguments(
        $args = array(
            'fields' => '*.*.*.*',
            'meta' => 'result_count,total_count,type',
            'filter[slug][eq]' => $slug
        )
      );
      $resources = $api->getData();
      if(empty($resources['data'])){
        return response()->view('errors.404',[],404);
      }
      return view('research.resource', compact('resources'));
    }

    public function resources()
    {
      $api = $this->getApi();
      $api->setEndpoint('online_resources');
      $api->setArguments(
        $args = array(
            'fields' => '*.*.*.*',
            'meta' => 'result_count,total_count,type',
            'sort' => 'id'
        )
      );
      $resources = $api->getData();
      return view('research.resources', compact('resources'));
    }

    public function opportunity(string $slug){
      $api = $this->getApi();
      $api->setEndpoint('research_opportunities');
      $api->setArguments(
        $args = array(
            'fields' => '*.*.*.*',
            'meta' => 'result_count,total_count,type',
            'filter[slug][eq]' => $slug
        )
      );
      $opps = $api->getData();
      if(empty($opps['data'])){
        return response()->view('errors.404',[],404);
      }
      return view('research.opportunity', compact('opps'));
    }

    public function opportunities(){
      $api = $this->getApi();
      $api->setEndpoint('research_opportunities');
      $api->setArguments(
        $args = array(
            'fields' => '*.*.*.*',
            'meta' => 'result_count,total_count,type',
            'sort' => 'id'
        )
      );
      $opps = $api->getData();
      return view('research.opportunities', compact('opps'));
    }
}
