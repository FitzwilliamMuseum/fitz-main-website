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
      $response = Http::get('https://content.fitz.ms/fitz-website/items/research_projects?fields=*.*.*');
      $projects = $response->json();
      return view('research.index', compact('projects'));
    }


}
