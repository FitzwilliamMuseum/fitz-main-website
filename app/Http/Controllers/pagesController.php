<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class pagesController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index($section, $slug)
  {
      $response = Http::get('https://content.fitz.ms/fitz-website/items/stubs_and_pages?fields=*.*.*&filter[slug]=' . $slug . '&filter[section]=' . $section);
      $pages = $response->json();
      return view('pages.index', compact('pages'));
  }

  public function landing($section)
  {
    $response = Http::get('https://content.fitz.ms/fitz-website/items/stubs_and_pages?fields=*.*.*&filter[section]=' . $section . '&filter[landing_page]=1');
    $pages = $response->json();
    return view('pages.landing', compact('pages'));
  }
}
