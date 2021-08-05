<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\DirectUs;
use App\MoreLikeThis;
use App\FitzElastic\Elastic;

class exhibitionsController extends Controller
{

  public function getElastic()
  {
    return new Elastic();
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
          'filter[type][eq]' => 'exhibition',
          'meta' => 'result_count,total_count,type',
          'sort' => '-ticketed'
      )
    );
    $current = $api2->getData();

    $disp = $this->getApi();
    $disp->setEndpoint('exhibitions');
    $disp->setArguments(
      $args = array(
          'fields' => '*.*.*.*',
          'filter[exhibition_status][eq]' => 'current',
          'filter[type][eq]' => 'display',
          'meta' => 'result_count,total_count,type',
          'sort' => '-ticketed'
      )
    );
    $displays = $disp->getData();

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
          'limit' => 3
      )
    );
    $archive = $api4->getData();
    return view('exhibitions.index', compact(
      'current', 'pages', 'archive',
      'future', 'displays'
    ));
  }

  public function archive()
  {
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
    return view('exhibitions.archives', compact('archive'));
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
    if(empty($exhibitions['data'])){
      return response()->view('errors.404',[],404);
    }
    $adlib = NULL;
    if(!is_null($exhibitions['data'][0]['adlib_id_exhibition'])){
      $params = [
        'index' => 'ciim',
        'size' => 3,
        'body' => [
          "query" => [
            "bool" => [
                "must" => [
                   [
                        "match" => [
                          'exhibitions.admin.id' => $exhibitions['data'][0]['adlib_id_exhibition']
                        ]
                   ],
                   [
                        "term" => [ "type.base" => 'object']
                   ],
                   [
                        "exists" => ['field' => 'multimedia']
                   ],
                ]
             ]
          ]
        ],
      ];
      $adlib = $this->getElastic()->setParams($params)->getSearch();
      $adlib = $adlib['hits']['hits'];
    }
    $mlt = new MoreLikeThis;
    $mlt->setLimit(3)->setType('exhibitions')->setQuery($slug);
    $records = $mlt->getData();
    return view('exhibitions.details', compact('exhibitions', 'records', 'adlib'));
  }

  public static function injectImmunity()
  {
      $api = new DirectUs;
      $api->setEndpoint('exhibitions');
      $api->setArguments(
        $args = array(
            'fields' => '*.*.*.*',
            'meta' => '*',
            'filter[immunity_from_seizure][nnull]' => '',
          )
      );
      $immunity = $api->getData();
      return $immunity;
  }

  public static function injectLoanImmunity()
  {
      $api = new DirectUs;
      $api->setEndpoint('incoming_loans');
      $api->setArguments(
        $args = array(
            'fields' => '*.*.*.*',
            'meta' => '*',
            'filter[immunity_from_seizure][nnull]' => '',
          )
      );
      $immunity = $api->getData();
      return $immunity;
  }
}
