<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\DirectUs;
use App\MoreLikeThis;
use App\FitzElastic\Elastic;
use Elasticsearch\ClientBuilder;
use Twitter;
use Cache;

class socialController extends Controller
{
  /**
  * Display a listing of the resource.
  *
  * @return \Illuminate\Http\Response
  */

  public function getElastic()
  {
    return new Elastic();
  }

  public function index()
  {
    return view('social.index');
  }

  public function instagram()
  {
    $api = $this->getApi();
    $api->setEndpoint('on_insta');
    $api->setArguments(
      $args = array(
        'fields' => '*.*.*.*',
        'meta' => 'result_count,total_count,type',
        'sort' => '-date_posted',
      )
    );
    $insta = $api->getData();
    return view('social.insta', compact('insta'));
  }

  public function story($slug)
  {
    $api = $this->getApi();
    $api->setEndpoint('on_insta');
    $api->setArguments(
      $args = array(
        'fields' => '*.*.*.*',
        'meta' => 'result_count,total_count,type',
        'filter[slug][eq]' => $slug
      )
    );
    $insta = $api->getData();
    $params = [
      'index' => 'ciim',
      'size' => 1,
      'body'  => [
        'query' => [
          'match' => [
            'identifier.accession_number' => strtoupper($insta['data'][0]['adlib_id'])
          ]
        ]
      ]
    ];
    $adlib = $this->getElastic()->setParams($params)->getSearch();
    $adlib = $adlib['hits']['hits'];
    return view('social.story', compact('insta', 'adlib'));
  }

  public function twitter()
  {
    $expiresTwitter = now()->addMinutes(60);
    if (Cache::has('cache_twitter_social')) {
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
      Cache::put('cache_twitter_social', $tweets, $expiresTwitter); // 1 hour
      return view('social.twitter', compact('tweets'));
    }

  }
}
