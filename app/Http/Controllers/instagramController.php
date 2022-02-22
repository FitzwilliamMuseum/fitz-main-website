<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Config;
use InstagramScraper\Exception\InstagramException;
use InstagramScraper\Exception\InstagramNotFoundException;
use Solarium\Client;
use Solarium\Core\Client\Adapter\Curl;
use Symfony\Component\EventDispatcher\EventDispatcher;
use Illuminate\Support\Facades\Cache;
use InstagramScraper\Instagram;
use Phpfastcache\Helper\Psr16Adapter;
use GuzzleHttp;

class instagramController extends Controller
{

    /**
     * @return void
     * @throws InstagramException
     * @throws InstagramNotFoundException
     */
  public function instagram()
  {
    $expires = now()->addMinutes(600);
    if (Cache::has('cache_insta_search')) {
      $insta = Cache::get('cache_insta_search');
    } else {
      $instagram = new Instagram(new GuzzleHttp\Client());
      $insta = $instagram->getMedias('fitzmuseum_uk');
      Cache::put('cache_insta_search', $insta, $expires);
    }
    $configSolr = Config::get('solarium');
    $client = new Client(new Curl(), new EventDispatcher(), $configSolr);
    $update = $client->createUpdate();
    $documents = array();
    foreach($insta as $gram)
    {
      $doc = $update->createDocument();
      $doc->id = md5($gram->getId());
      $text = iconv(mb_detect_encoding($gram->getCaption(), mb_detect_order(), true), "UTF-8", $gram->getCaption());
      $text = transliterator_transliterate('Any-Latin; Latin-ASCII; [\u0080-\u7fff] remove', $text);
      $text = trim( preg_replace('/[\x00-\x1F\x80-\xFF]/', '', mb_convert_encoding( $gram->getCaption(), "UTF-8" ) ) );
      $doc->title = substr($text, 0, 100);
      $doc->description = $text;
      $doc->url = $gram->getLink();
      $doc->contentType = 'instagram-'. $gram->getType();
      $doc->thumbnail = $gram->getImageThumbnailUrl();
      $doc->image = $gram->getImageHighResolutionUrl();
      $doc->searchImage = 'https://fitz-cms-images.s3.eu-west-2.amazonaws.com/insta.png';
      $documents[] = $doc;
    }
    $update->addDocuments($documents);
    $update->addCommit();
    $client->update($update);
  }

}
