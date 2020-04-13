<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class homeController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $request_one = Http::get('https://content.fitz.ms/fitz-website/items/carousels?fields=*.*&sort=-id&single=1&filter[section]=home');
    $carousel = $request_one->json();
    $request_two = Http::get('https://content.fitz.ms/fitz-website/items/news_articles?fields=*.*&sort=-id&limit=3');
    $news = $request_two->json();
    $request_three = Http::get('https://content.fitz.ms/fitz-website/items/research_projects?fields=*.*&sort=-id&limit=3');
    $research = $request_three->json();
    return view('index', compact('carousel','news', 'research'));
  }
}
