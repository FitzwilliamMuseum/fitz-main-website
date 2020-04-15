<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class researchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     public function index()
     {
       $first = Http::get('https://content.fitz.ms/fitz-website/items/stubs_and_pages?fields=*.*.*&filter[section]=research&filter[landing_page]=1');
       $pages = $first->json();
       $response = Http::get('https://content.fitz.ms/fitz-website/items/research_projects?fields=*.*.*&limit=3');
       $projects = $response->json();
       return view('research.index', compact('projects', 'pages'));
     }

    public function projects()
    {
      $response = Http::get('https://content.fitz.ms/fitz-website/items/research_projects?fields=*.*.*&sort=title');
      $projects = $response->json();
      return view('research.projects', compact('projects'));
    }

    public function project($slug)
    {
      $response = Http::get('https://content.fitz.ms/fitz-website/items/research_projects?fields=*.*.*&filter[slug]=' . $slug);
      $projects = $response->json();
      return view('research.project', compact('projects'));
    }

    public function profiles()
    {
      $response = Http::get('https://content.fitz.ms/fitz-website/items/staff_profiles?fields=*.*.*&sort=last_name');
      $profiles = $response->json();
      return view('research.profiles', compact('profiles'));
    }

    public function profile($slug)
    {
      $response = Http::get('https://content.fitz.ms/fitz-website/items/staff_profiles?fields=*.*.*.*&filter[slug]=' . $slug);
      $profiles = $response->json();
      return view('research.profile', compact('profiles'));
    }
}
