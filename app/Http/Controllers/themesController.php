<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class themesController extends Controller
{

  public function index()
  {
    $first = Http::get('https://content.fitz.ms/fitz-website/items/stubs_and_pages?fields=*.*.*&filter[section]=themes&filter[landing_page]=1');
    $pages = $first->json();
    $response = Http::get('https://content.fitz.ms/fitz-website/items/themes?fields=*.*.*&limit=3');
    $themes = $response->json();
    return view('themes.index', compact('themes', 'pages'));
  }

  public function theme($slug)
  {
    $response = Http::get('https://content.fitz.ms/fitz-website/items/themes?filter[slug]=' . $slug . '&fields=*.*.*');
    $themes = $response->json();
    return view('themes.theme', compact('themes'));
  }
}
