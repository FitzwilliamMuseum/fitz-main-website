<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\MoreLikeThis;
use Twitter;
use Cache;
use App\DirectUs;

class pagesController extends Controller
{
  /**
  * Display a listing of the resource.
  *
  * @return \Illuminate\Http\Response
  */
  public function index($section, $slug)
  {
    $api = $this->getApi();
    $api->setEndpoint('stubs_and_pages');
    $api->setArguments(
      $args = array(
        'fields' => '*.*.*.*',
        'meta' => 'result_count,total_count,type',
        'filter[slug][eq]' => $slug,
        'filter[section][eq]' => $section,
      )
    );
    $pages = $api->getData();
    if(empty($pages['data'])){
      return response()->view('errors.404',[],404);
    }
    $mlt = new MoreLikeThis;
    $mlt->setLimit(3)->setType('page')->setQuery($slug);
    $records = $mlt->getData();
    return view('pages.index', compact('pages', 'records'));
  }

  public function landing($section)
  {
    $api = $this->getApi();
    $api->setEndpoint('stubs_and_pages');
    $api->setArguments(
      $args = array(
        'fields' => '*.*.*.*',
        'meta' => 'result_count,total_count,type',
        'filter[landing_page][null]' => '',
        'filter[section][eq]' => $section,
        'filter[associate_with_landing_page][eq]' => '1',
        'sort' => '-id'
      )
    );
    $associated = $api->getData();

    $api2 = $this->getApi();
    $api2->setEndpoint('stubs_and_pages');
    $api2->setArguments(
      $args = array(
        'fields' => '*.*.*.*',
        'meta' => 'result_count,total_count,type',
        'filter[landing_page][eq]' => '1',
        'filter[section][eq]' => $section,

      )
    );
    $pages = $api2->getData();
    if(empty($pages['data'])){
      return response()->view('errors.404',[],404);
    }
    if($section == 'learning') {
      $expiresTwitter = now()->addMinutes(60);
      if (Cache::has('cache_twitter_schools_1')) {
        $tweets = Cache::get('cache_twitter_schools_1');
      } else {
        $tweets = Twitter::getUserTimeline([
          'screen_name' => 'FitzMuseumEduca',
          'count' => 10,
          'format' => 'object',
          'tweet_mode' => 'extended',
          'include_rts' => true,
          'exclude_replies' => true
        ]);
        Cache::put('cache_twitter_schools_1', $tweets, $expiresTwitter); // 1 hour
      }
      $tweets = array_slice($tweets, 0,3);
    } else {
      $tweets = array();
    }
    return view('pages.landing', compact('pages', 'associated', 'tweets'));
  }

  public static function injectPages(string $section = '', string $slug = '')
  {
      $api = new DirectUs;
      $api->setEndpoint('stubs_and_pages');
      $api->setArguments(
        $args = array(
            'fields' => '*.*.*.*.*',
            'filter[section][eq]' => $section,
            'filter[slug][eq]' => $slug,
          )
      );
      $pages = $api->getData();
      return $pages;
  }
}
