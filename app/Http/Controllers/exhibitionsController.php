<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\DirectUs;
use App\MoreLikeThis;

class exhibitionsController extends Controller
{
  public function getApi(){
    $directus = new DirectUs;
    return $directus;
  }

  public function index()
  {
    $api = $this->getApi();
    $api->setEndpoint('stubs_and_pages');
    $api->setArguments(
      $args = array(
          'fields' => '*.*.*.*',
          'filter[section]' => 'exhibitions',
          'filter[landing_page][eq]' => '1',
          'meta' => 'result_count,total_count,type'
      )
    );
    $pages = $api->getData();

    $api2 = $this->getApi();
    $api2->setEndpoint('exhibitions');
    $api2->setArguments(
      $args = array(
          'fields' => '*.*.*.*',
          'filter[exhibition_status][eq]' => 'current',
          'meta' => 'result_count,total_count,type'
      )
    );
    $current = $api2->getData();

    $api3 = $this->getApi();
    $api3->setEndpoint('exhibitions');
    $api3->setArguments(
      $args = array(
          'fields' => '*.*.*.*',
          'filter[exhibition_status][eq]' => 'future',
          'meta' => 'result_count,total_count,type'
      )
    );
    $future = $api3->getData();

    $api4 = $this->getApi();
    $api4->setEndpoint('exhibitions');
    $api4->setArguments(
      $args = array(
          'fields' => '*.*.*.*',
          'filter[exhibition_status][eq]' => 'archived',
          'meta' => 'result_count,total_count,type',
          'sort' => '-exhibition_end_date',
          'limit' => 100
      )
    );
    $archive = $api4->getData();
    return view('exhibitions.index', compact(
      'current', 'pages', 'archive',
      'future'
    ));
  }

  public function details($slug)
  {
    $api = $this->getApi();
    $api->setEndpoint('exhibitions');
    $api->setArguments(
      $args = array(
          'fields' => '*.*.*.*.*.*',
          'filter[slug][eq]' => $slug,
          'meta' => 'result_count,total_count,type'
      )
    );
    $exhibitions = $api->getData();

    $mlt = new MoreLikeThis;
    $mlt->setLimit(3)->setType('exhibitions')->setQuery($slug);
    $records = $mlt->getData();
    return view('exhibitions.details', compact('exhibitions', 'records'));
  }
}
