<?php

namespace App;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Carbon\Carbon;
use Solarium\Client;
use Solarium\Core\Client\Adapter\Curl;
use Symfony\Component\EventDispatcher\EventDispatcher;
use Solarium\Exception;
use Illuminate\Support\Arr;
use PHPShopify\ShopifySDK;

class SolrImporter {

  public function import($data, $contentType, $table, $route, $params, $mapping)
  {
      $configSolr = \Config::get('solarium');
      $client = new Client(new Curl(), new EventDispatcher(), $configSolr);
      $update = $client->createUpdate();
      $documents = array();
      foreach($data as $record)
      {
        $parameters = [];
        foreach($params as $param){
          $parameters[] = $record[$param];
        }
        $title = Arr::get($record, $mapping['title']);
        $content = strip_tags(Arr::get($record, $mapping['content']));
        if(array_key_exists('image', $mapping)){
          $image = $mapping['image'];
        } else {
          $image = 'hero_image';
        }
        $doc = $update->createDocument();
        $doc->id = $record['id'] . '-' . $table;
        $doc->title = $title;
        $doc->description = $content;
        $doc->body = $content;
        if(array_key_exists('slug', $record)){
          $doc->slug = $record['slug'];
        }
        $doc->url = route($route, $parameters);
        $doc->contentType = $contentType;
        if(array_key_exists($image, $record)) {
          if(!empty($record[$image]['data'])){
            $doc->thumbnail = $record[$image]['data']['thumbnails'][5]['url'];
            $doc->image = $record[$image]['data']['full_url'];
            $doc->smallimage = $record[$image]['data']['thumbnails'][4]['url'];
            $doc->searchImage = $record[$image]['data']['thumbnails'][2]['url'];
          }
        }
        if(isset($record['section'])){
          $doc->section = $record['section'];
        }
        if(isset($record['keystages'])){
          $doc->keystages = implode(',', $record['keystages']);
        }
        if(isset($record['key_stages'])){
          $doc->keystages = implode(',', $record['key_stages']);
        }
        if(isset($record['theme'])){
          $doc->theme = implode(',', $record['theme']);
        }
        if(isset($record['session_type'])){
          $doc->session_type = implode(',', $record['session_type']);
        }
        if(isset($record['type_of_activity'])){
          $doc->type_of_activity = implode(',', $record['type_of_activity']);
        }
        if(isset($record['type'])){
          $doc->type_of_activity = $record['type'];
        }
        if(isset($record['curriculum_area'])){
          $doc->curriculum_link = implode(',', $record['curriculum_area']);
        }
        if(array_key_exists('file', $mapping)) {
          $doc->url = $record[$mapping['file']]['data']['url'];
          $doc->mimetype = $record[$mapping['file']]['type'];
          $doc->filesize = $record[$mapping['file']]['filesize'];
        }
        $documents[] = $doc;
      }
      $update->addDocuments($documents);
      $update->addCommit();
      return $client->update($update);
  }

  public function getShopifyObjects()
  {
    $config = array(
    'ShopUrl' => env('SHOPIFY_FME_URL'),
    'ApiKey' => env('SHOPIFY_FME_API_KEY'),
    'Password' => env('SHOPIFY_FME_API_PASSWORD'),
    );
    $shop = new ShopifySDK;
    $shop->config($config);
    $lastId = 1;
    return $shop->Product->get(['limit' => 250, 'since_id' => $lastId, 'status' => 'active']);
  }

  public function shopify()
  {
    $shopify = $this->getShopifyObjects();
    $url = env('SHOPIFY_FME_URL');
    $shop = env('SHOPIFY_FME_LIVE_URL');
    $protocol = env('SHOPIFY_FME_PROTOCOL');
    $catalogue = env('SHOPIFY_FME_CATALOGUE');
    $configSolr = \Config::get('solarium');
    $client = new Client(new Curl(), new EventDispatcher(), $configSolr);
    $update = $client->createUpdate();
    foreach($shopify as $product) {
      $doc = $update->createDocument();
      $doc->id = $product['id'];
      $doc->title = $product['title'];
      $description = $product['body_html'];
      $doc->description = strip_tags($description);
      $doc->body = strip_tags($description);
      $doc->url = $protocol . $shop . $catalogue . $product['handle'];
      $doc->slug = $product['handle'];
      $doc->vendor = $product['vendor'];
      if(array_key_exists('image', $product)){
        $doc->thumbnail = $product['image']['src'];
        $doc->image = $product['image']['src'];
        $doc->searchImage = $product['image']['src'];
      }
      $doc->price = $product['variants'][0]['price'];
      $doc->contentType = 'shopify';
      $documents[] = $doc;
    }
    $update->addDocuments($documents);
    $update->addCommit();
    return $result = $client->update($update);
  }

}
