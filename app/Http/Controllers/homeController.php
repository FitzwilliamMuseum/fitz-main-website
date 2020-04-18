<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

use Twitter;
use Youtube;
use Cache;

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
    $request_four = Http::get('https://content.fitz.ms/fitz-website/items/themes?fields=*.*&sort=-id&limit=3');
    $themes = $request_four->json();
    if (Cache::has('cache_twitter')) {
      $tweets = Cache::get('cache_twitter');
    } else {
      $tweets = Twitter::getUserTimeline(['screen_name' => 'fitzmuseum_uk', 'count' => 3, 'format' => 'object']);
      Cache::put('cache_twitter', $tweets, 60); // 1 hour
    }
    if (Cache::has('cache_yt')) {
      $videoList = Cache::get('cache_yt');
    } else {
      $videoList = Youtube::listChannelVideos('UCFwhw5uPJWb4wVEU3Y2nScg', 3, 'date');
      Cache::put('cache_yt', $videoList, 14400); // 1 hour
    }
    return view('index', compact(
      'carousel','news', 'research',
      'themes','tweets', 'videoList'
    ));
  }
}
