<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Carbon\Carbon;

use Twitter;
use Youtube;
use Cache;
use InstagramScraper\Instagram;
use Phpfastcache\Helper\Psr16Adapter;
use Solarium\Core\Client\Client;
use Solarium\Exception;
use Solarium\Core\Client\Adapter\Curl;
use App\TessituraApi;

use Symfony\Component\EventDispatcher\EventDispatcher;


class homeController extends Controller
{

  /**
   * [getApi description]
   * @return [type] [description]
   */
  public function getTessituraApi(){
    return new TessituraApi;
  }

  /**
   * [translateType description]
   * @param  string $facility [description]
   * @return [type]           [description]
   */
  public function translateType(string $facility)
  {
    switch ($facility) {
      case 'virtual-bookings':
      $int = 19;
      break;
      case 'general-timed':
      $int = 20;
      break;
      case 'exhibition-timed':
      $int = 21;
      break;
      case 'lecture':
      $int = 56;
      break;
      case 'fff-tours-2pm':
      $int = 66;
      break;
      case 'fff-tours-3pm':
      $int = 76;
      break;
      case 'fff-dragon-dance':
      $int = 116;
      break;
      case 'fff-storytelling-230pm':
      $int = 86;
      break;
      case 'fff-storytelling-330pm':
      $int = 96;
      break;
      default:
      $int = 20;
      break;
    }
    return $int;
  }

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
          'meta' => 'result_count,total_count,type',
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
          'meta' => 'result_count,total_count,type',
          'sort' => '-publication_date',
          'limit' => 3
      )
    );
    $news = $api2->getData();

    $api3 = $this->getApi();
    $api3->setEndpoint('research_projects');
    $api3->setArguments(
      $args = array(
          'fields' => '*.*.*.*',
          // 'meta' => 'result_count,total_count,type',
          'sort' => '?',
          'limit' => 3,
          // 'filter[featured][eq]' => 'yes'
      )
    );
    $research = $api3->getData();

    $api6 = $this->getApi();
    $api6->setEndpoint('fundraising');
    $api6->setArguments(
      $args = array(
          'fields' => '*.*.*.*',
          // 'meta' => 'result_count,total_count,type',
          'limit' => 3
      )
    );
    $fundraising = $api6->getData();

    $api4 = $this->getApi();
    $api4->setEndpoint('pharos');
    $api4->setArguments(
      $args = array(
          'fields' => '*.*.*.*',
          // 'meta' => 'result_count,total_count,type',
          'sort' => '?',
          'limit' => 3,
          // 'filter[featured][eq]' => 'yes'
      )
    );
    $objects = $api4->getData();

    $api5 = $this->getApi();
    $api5->setEndpoint('things_to_do');
    $api5->setArguments(
      $args = array(
          'fields' => '*.*.*.*',
          // 'meta' => 'result_count,total_count,type',
          'sort' => '-id',
          'limit' => 3
      )
    );
    $things = $api5->getData();
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

       $query->addSort('random_'.$randString, $query::SORT_DESC);
       $call = $client->select($query);
       $shopify = $call->getDocuments();
         Cache::store('file')->put($key, $shopify, $expiresAt);
     }
     $keyTess = md5('tessitura-home');

     if (Cache::has($keyTess)) {
       $productions = Cache::store('file')->get($keyTess);
     } else {
       $prods = $this->getTessituraApi();
       $prods->setPerformanceStartDate(Carbon::now());
       $prods->setPerformanceEndDate(Carbon::now()->addDays(30));
       $prods->setFacilities('lectures');
       $productions = $prods->getPerformancesSearch();
     }
    return view('index', compact(
      'carousel','news', 'research',
      'objects', 'things', 'fundraising',
      'shopify','productions'
    ));
  }
}
