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
             'meta' => '*',
             'filter[landing_page][eq]' => '1',
             'filter[section][eq]' => 'research',
         )
       );
       $pages = $api->getData();

       $api2 = $this->getApi();
       $api2->setEndpoint('research_projects');
       $api2->setArguments(
         $args = array(
             'fields' => '*.*.*',
             'meta' => '*',
             'limit' => '3'
         )
       );
       $projects = $api2->getData();
       return view('research.index', compact('projects', 'pages'));
     }

    public function projects()
    {
      $api = $this->getApi();
      $api->setEndpoint('research_projects');
      $api->setArguments(
        $args = array(
            'fields' => '*.*.*.*',
            'meta' => '*',
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
            'meta' => '*',
            'filter[slug][eq]' => $slug
        )
      );
      $projects = $api->getData();

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
            'meta' => '*',
            'sort' => 'last_name'
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
      return view('research.profile', compact('profiles'));
    }

    public function resource($slug)
    {
      $api = $this->getApi();
      $api->setEndpoint('online_resources');
      $api->setArguments(
        $args = array(
            'fields' => '*.*.*.*',
            'meta' => '*',
            'filter[slug][eq]' => $slug
        )
      );
      $resources = $api->getData();
      return view('research.resource', compact('resources'));
    }

    public function resources()
    {
      $api = $this->getApi();
      $api->setEndpoint('online_resources');
      $api->setArguments(
        $args = array(
            'fields' => '*.*.*.*',
            'meta' => '*',
            'sort' => 'id'
        )
      );
      $resources = $api->getData();
      return view('research.resources', compact('resources'));
    }
}
