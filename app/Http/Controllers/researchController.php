<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

use App\Models\StaffProfiles;
use App\Models\ResearchProjects;
use App\Models\OnlineResources;
use App\Models\Stubs;
use App\Models\ResearchOpportunities;
use App\Models\FindMoreLikeThis;

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
      $projects = ResearchProjects::list();
      return view('research.projects', compact('projects'));
    }

    public function project(string $slug)
    {
      $projects = ResearchProjects::find($slug);
      $records = FindMoreLikeThis::find($slug,'projects');
      if(empty($projects['data'])){
        return response()->view('errors.404',[],404);
      }

      return view('research.project', compact('projects', 'records'));
    }

    public function profiles()
    {
      $profiles = StaffProfiles::list();
      return view('research.profiles', compact('profiles'));
    }

    public function profile(string $slug)
    {
      $profiles = StaffProfiles::find($slug);
      if(empty($profiles['data'])){
        return response()->view('errors.404',[],404);
      }
      return view('research.profile', compact('profiles'));
    }

    public function resource(string $slug)
    {
      $resources = OnlineResources::find($slug);
      if(empty($resources['data'])){
        return response()->view('errors.404',[],404);
      }
      return view('research.resource', compact('resources'));
    }

    public function resources()
    {
      $resources = OnlineResources::list();
      return view('research.resources', compact('resources'));
    }

    public function opportunity(string $slug){
      $opps = ResearchOpportunities::find($slug);
      if(empty($opps['data'])){
        return response()->view('errors.404',[],404);
      }
      return view('research.opportunity', compact('opps'));
    }

    public function opportunities(){
      $opps = ResearchOpportunities::list();
      return view('research.opportunities', compact('opps'));
    }
}
