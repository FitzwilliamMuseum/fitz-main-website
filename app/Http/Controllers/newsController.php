<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class newsController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $response = Http::get('https://content.fitz.ms/fitz-website/items/news_articles?fields=*.*.*&sort=-id&limit=20');
    $news = $response->json();
    return view('news.index', compact('news'));
  }

  public function article($slug)
  {
    $response = Http::get('https://content.fitz.ms/fitz-website/items/news_articles?filter[slug]=' . $slug . '&fields=*.*.*');
    $news = $response->json();
    return view('news.article', compact('news'));
  }
  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function show($id)
  {
      //
  }
}
