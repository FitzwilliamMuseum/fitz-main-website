<?php

namespace App;
use Twitter;
use Illuminate\Support\Facades\Cache;

class TwitterSearch
{
    /**
     * @return mixed
     */
    public static function getTimeLine(): mixed
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
        return $tweets;
    }
}
