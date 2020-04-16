<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class exhibitionsController extends Controller
{
  public function index()
  {
    $first = Http::get('https://content.fitz.ms/fitz-website/items/stubs_and_pages?fields=*.*.*&filter[section]=exhibitions&filter[landing_page][eq]=1');
    $pages = $first->json();
    $second = Http::get('https://content.fitz.ms/fitz-website/items/exhibitions?fields=*.*.*&filter[exhibition_status][eq]=current&meta=*');
    $current = $second->json();
    $third = Http::get('https://content.fitz.ms/fitz-website/items/exhibitions?fields=*.*.*&filter[exhibition_status][eq]=future&meta=*');
    $future = $third->json();
    $fourth = Http::get('https://content.fitz.ms/fitz-website/items/exhibitions?fields=*.*.*&filter[exhibition_status][eq]=archived&meta=*');
    $archive = $fourth->json();
    return view('exhibitions.index', compact('current', 'pages', 'archive', 'future'));
  }

  public function details($slug)
  {

    $details = Http::get('https://content.fitz.ms/fitz-website/items/exhibitions?fields=*.*.*&filter[slug][eq]='.$slug.'&meta=*');
    $exhibitions = $details->json();
    return view('exhibitions.details', compact('exhibitions'));
  }
}
