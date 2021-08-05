<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\DirectUs;
use App\FitzElastic\Elastic;

class galleriesController extends Controller
{

    public function index()
    {
      $api = $this->getApi();
      $api->setEndpoint('stubs_and_pages');
      $api->setArguments(
        $args = array(
            'fields' => '*.*.*.*',
            'filter[section]' => 'galleries',
            'filter[landing_page][eq]' => '1',
            'meta' => 'result_count,total_count,type'
        )
      );
      $pages = $api->getData();

      $api2 = $this->getApi();
      $api2->setEndpoint('galleries');
      $api2->setArguments(
        $args = array(
            'fields' => '*.*.*.*',
            'meta' => 'result_count,total_count,type'
        )
      );
      $galleries = $api2->getData();
      return view('galleries.index', compact('galleries', 'pages'));
    }

    public function gallery($slug)
    {
      $api = $this->getApi();
      $api->setEndpoint('galleries');
      $api->setArguments(
        $args = array(
            'fields' => '*.*.*.*',
            'filter[slug]' => $slug,
            'meta' => '*'
        )
      );
      $galleries = $api->getData();
      if(empty($galleries['data'])){
        return response()->view('errors.404',[],404);
      }
      return view('galleries.gallery', compact('galleries'));
    }

    public static function getObjects($prirefs){
      $elastic = new Elastic();
      $prirefs = str_replace(',', ' OR ', $prirefs);
      $params =[
        'index' => 'ciim',
        'size' => 6,
        'body' => [
          "query" => [
            "bool" => [
              "must" => [
                [
                  "match" => [
                    "identifier.priref" => $prirefs
                  ]
                ],
                [
                  "term" => [ "type.base" => "object"]
                ]
              ]
            ]
          ]
        ]
      ];
      return $elastic->setParams($params)->getSearch()['hits']['hits'];

    }
}
