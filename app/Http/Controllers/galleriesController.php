<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class galleriesController extends Controller
{
    public function index()
    {
      $first = Http::get('https://content.fitz.ms/fitz-website/items/stubs_and_pages?fields=*.*.*&filter[section]=galleries&filter[landing_page]=1');
      $pages = $first->json();
      $response = Http::get('https://content.fitz.ms/fitz-website/items/galleries?fields=*.*.*');
      $galleries = $response->json();
      return view('galleries.index', compact('galleries', 'pages'));
    }

    public function gallery($slug)
    {
      $response = Http::get('https://content.fitz.ms/fitz-website/items/galleries?filter[slug]=' . $slug . '&fields=*.*.*.*');
      $galleries = $response->json();
      return view('galleries.gallery', compact('galleries'));
    }
}
