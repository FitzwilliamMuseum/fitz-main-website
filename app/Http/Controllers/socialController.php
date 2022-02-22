<?php

namespace App\Http\Controllers;

use App\Models\CIIM;
use App\Models\Instagram;
use Cache;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Twitter;

class socialController extends Controller
{
    /**
     * @return View
     */
    public function index(): View
    {
        return view('social.index');
    }

    /**
     * @param Request $request
     * @return View
     */
    public function instagram(Request $request): View
    {
        $paginator = Instagram::list($request);
        $insta = $paginator->items();
        return view('social.insta', compact('insta', 'paginator'));
    }

    /**
     * @param string $slug
     * @return View
     */
    public function story(string $slug): View
    {
        $insta = Instagram::find($slug);
        $adlib = CIIM::findByAccession($insta['data'][0]['adlib_id']);
        return view('social.story', compact('insta', 'adlib'));
    }

    /**
     * @return View
     */
    public function twitter(): View
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
