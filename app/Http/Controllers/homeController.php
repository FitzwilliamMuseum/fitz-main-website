<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

use Twitter;
use Youtube;
use Cache;
use InstagramScraper\Instagram;
use Phpfastcache\Helper\Psr16Adapter;
use Solarium\Core\Client\Client;
use Solarium\Exception;

class homeController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $api = $this->getApi();
    $api->setEndpoint('carousels');
    $api->setArguments(
      $args = array(
          'fields' => '*.*.*.*',
          'meta' => '*',
          'filter[section][eq]' => 'home',
          'single' => '1',
          'sort' => '-id'
      )
    );
    $carousel = $api->getData();

    $api2 = $this->getApi();
    $api2->setEndpoint('news_articles');
    $api2->setArguments(
      $args = array(
          'fields' => '*.*.*.*',
          'meta' => '*',
          'sort' => '-id',
          'limit' => 3
      )
    );
    $news = $api2->getData();

    $api3 = $this->getApi();
    $api3->setEndpoint('research_projects');
    $api3->setArguments(
      $args = array(
          'fields' => '*.*.*.*',
          'meta' => '*',
          'sort' => '-id',
          'limit' => 3,
          'filter[featured][eq]' => 'yes'
      )
    );
    $research = $api3->getData();

    $api6 = $this->getApi();
    $api6->setEndpoint('fundraising');
    $api6->setArguments(
      $args = array(
          'fields' => '*.*.*.*',
          'meta' => '*',
          'limit' => 3
      )
    );
    $fundraising = $api6->getData();

    $api4 = $this->getApi();
    $api4->setEndpoint('pharos');
    $api4->setArguments(
      $args = array(
          'fields' => '*.*.*.*',
          'meta' => '*',
          'sort' => '-id',
          'limit' => 3,
          'filter[featured][eq]' => 'yes'
      )
    );
    $objects = $api4->getData();

    $api5 = $this->getApi();
    $api5->setEndpoint('things_to_do');
    $api5->setArguments(
      $args = array(
          'fields' => '*.*.*.*',
          'meta' => '*',
          'sort' => '-id',
          'limit' => 3
      )
    );
    $things = $api5->getData();
    $expiresTwitter = now()->addMinutes(60);
    $expiresInstagram = now()->addMinutes(600);
    $expiresYouTube = now()->addMinutes(6000);

    if (Cache::has('cache_twitter')) {
      $tweets = Cache::get('cache_twitter');
    } else {
      $tweets = Twitter::getUserTimeline([
        'screen_name' => 'fitzmuseum_uk',
        'count' => 10,
        'format' => 'object',
        'tweet_mode' => 'extended',
        'include_rts' => false,
        'exclude_replies' => true
      ]);
      Cache::put('cache_twitter', $tweets, $expiresTwitter); // 1 hour
    }
    
    $tweets = array_slice($tweets, 0,3);

    if (Cache::has('cache_yt')) {
      $videoList = Cache::get('cache_yt');
    } else {
      $videoList = Youtube::listChannelVideos('UCFwhw5uPJWb4wVEU3Y2nScg', 3, 'date');
      Cache::put('cache_yt', $videoList, $expiresYouTube); // 1 hour
    }

    $expiresAt = now()->addMinutes(3600);
    $key = md5('shopify-api-front');

    if (Cache::has($key)) {
        $shopify = Cache::store('file')->get($key);
    } else {
        $configSolr = \Config::get('solarium');
        $client = new Client($configSolr);
        $query = $client->createSelect();
        $query->setQuery('contentType:shopify');
        $query->setRows(4);
        $call = $client->select($query);
        $shopify = $call->getDocuments();
        Cache::store('file')->put($key, $shopify, $expiresAt);
    }

    return view('index', compact(
      'carousel','news', 'research',
      'objects','tweets', 'videoList',
      'things', 'fundraising', 'shopify'
    ));
  }
}
