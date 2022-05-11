<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Cache;
use Solarium\Client;
use Solarium\Core\Client\Adapter\Curl;
use Solarium\Core\Query\Result\ResultInterface;
use Solarium\QueryType\Update\Result;
use Symfony\Component\EventDispatcher\EventDispatcher;
use Atymic\Twitter\Facade\Twitter;

class twitterController extends Controller
{

    /**
     * @return ResultInterface|Result
     */
    public function twitter(): Result|ResultInterface
    {
        $expiresTwitter = now()->addMinutes(360);
        if (Cache::has('cache_twitter_solr')) {
            $tweets = Cache::get('cache_twitter_solr');
        } else {
            $tweets = Twitter::getUserTimeline([
                'screen_name' => 'fitzmuseum_uk',
                'count' => 400,
                'format' => 'object',
                'tweet_mode' => 'extended',
                'include_rts' => false,
                'exclude_replies' => true
            ]);
            Cache::put('cache_twitter_solr', $tweets, $expiresTwitter); // 1 hour
        }
        $configSolr = Config::get('solarium');
        $client = new Client(new Curl(), new EventDispatcher(), $configSolr);
        $update = $client->createUpdate();
        $documents = array();

        foreach ($tweets as $tweet) {
            $doc = $update->createDocument();
            $doc->id = $tweet->id;
            $fulltext = iconv(mb_detect_encoding($tweet->full_text, mb_detect_order(), true), "UTF-8", $tweet->full_text);
            $cleaned = transliterator_transliterate('Any-Latin; Latin-ASCII; [\u0080-\u7fff] remove', $fulltext);
            $text = trim(preg_replace('/[\x00-\x1F\x80-\xFF]/', '', mb_convert_encoding($cleaned, "UTF-8")));
            $doc->title = substr($text, 0, 200);
            $doc->description = $text;
            $doc->created = $tweet->created_at;
            $doc->url = Twitter::linkTweet($tweet);
            $doc->contentType = 'twitter';
            $doc->favorite_count = $tweet->favorite_count;
            $doc->retweet_count = $tweet->retweet_count;
            if (!empty($tweet->extended_entities)) {
                foreach ($tweet->extended_entities as $entity) {
                    $doc->thumbnail = $entity[0]->media_url_https;
                    $doc->image = $entity[0]->media_url_https;
                    $doc->searchImage = $entity[0]->media_url_https;
                }
            }
            $documents[] = $doc;
        }
        dd($documents);
        $update->addDocuments($documents);
        $update->addCommit();
        return $client->update($update);
    }

}
