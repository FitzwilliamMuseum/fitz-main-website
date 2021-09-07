<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Solarium\Client;
use Solarium\Core\Client\Adapter\Curl;
use Symfony\Component\EventDispatcher\EventDispatcher;
use Solarium\Exception;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Cache;
use App\SolrImporter;
use GuzzleHttp;
use Twitter;


class twitterController extends Controller
{
  public function twitter()
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
    dump($tweets[0]);
    $configSolr = \Config::get('solarium');
    $this->client = new Client(new Curl(), new EventDispatcher(), $configSolr);
    $update = $this->client->createUpdate();
    $documents = array();
    foreach($tweets as $tweet)
    {
      $doc = $update->createDocument();
      $doc->id = $tweet->id;
      $text = iconv(mb_detect_encoding($tweet->full_text, mb_detect_order(), true), "UTF-8", $tweet->full_text);
      $text = transliterator_transliterate('Any-Latin; Latin-ASCII; [\u0080-\u7fff] remove', $text);
      $text = trim( preg_replace('/[\x00-\x1F\x80-\xFF]/', '', mb_convert_encoding( $tweet->full_text, "UTF-8" ) ) );
      $doc->title = substr($text, 0, 200);
      $doc->description = $text;
      $doc->created = $tweet->created_at;
      $doc->url = Twitter::linkTweet($tweet);
      $doc->contentType = 'twitter';
      $doc->favorite_count = $tweet->favorite_count;
      $doc->retweet_count = $tweet->retweet_count;
      if(!empty($tweet->extended_entities)){
        foreach($tweet->extended_entities as $entity){
          $doc->thumbnail = $entity[0]->media_url_https;
          $doc->image = $entity[0]->media_url_https;
          $doc->searchImage = $entity[0]->media_url_https;
        }
      }
      $documents[] = $doc;
    }
    $update->addDocuments($documents);
    $update->addCommit();
    $result = $this->client->update($update);
  }

}
