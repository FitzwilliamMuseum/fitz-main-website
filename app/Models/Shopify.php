<?php

namespace App\Models;

use Carbon\Carbon;
use Cache;
use Solarium\Core\Client\Client;
use Solarium\Exception;
use Solarium\Core\Client\Adapter\Curl;
use Symfony\Component\EventDispatcher\EventDispatcher;

class Shopify extends Model
{
  public static function list()
  {
    $expiresAt = now()->addMinutes(3600);
    $key = md5('shopify-api-front');
    if (Cache::has($key)) {
      $shopify = Cache::store('file')->get($key);
    } else {
      $configSolr = \Config::get('solarium');
      $client = new Client(new Curl(), new EventDispatcher(), $configSolr);
      $query = $client->createSelect();
      $query->setQuery('contentType:shopify AND price:[1 TO *]');
      $query->setRows(4);
      $randString = mt_rand();

      $query->addSort('random_' . $randString, $query::SORT_DESC);
      $call = $client->select($query);
      $shopify = $call->getDocuments();
      Cache::store('file')->put($key, $shopify, $expiresAt);
    }
    return $shopify;
  }
}
