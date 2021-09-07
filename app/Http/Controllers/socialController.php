<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\DirectUs;
use App\MoreLikeThis;
use Twitter;
use Cache;
use App\Models\Instagram;
use App\Models\CIIM;

class socialController extends Controller
{
  public function index()
  {
    return view('social.index');
  }

  public function instagram(Request $request)
  {
    $paginator = Instagram::list($request);
    $insta = $paginator->items();
    return view('social.insta', compact('insta', 'paginator'));
  }

  public function story($slug)
  {
    $insta = Instagram::find($slug);
    $adlib = CIIM::findByAccession($insta['data'][0]['adlib_id']);
    return view('social.story', compact('insta', 'adlib'));
  }

  public function twitter()
  {
    $expiresTwitter = now()->addMinutes(360);
    if (Cache::has('cache_twitter_social_list')) {
      $tweets = Cache::get('cache_twitter_social_list');
    } else {
      $tweets = Twitter::getUserTimeline([
        'screen_name' => 'fitzmuseum_uk',
        'count' => 36,
        'format' => 'object',
        'tweet_mode' => 'extended',
        'include_rts' => false,
        'exclude_replies' => true
      ]);
      Cache::put('cache_twitter_social_list', $tweets, $expiresTwitter); // 1 hour
    }
    return view('social.twitter', compact('tweets'));

  }

}
