<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\DirectUs;
use App\FitzElastic\Elastic;


class collectionsController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $first = new DirectUs;
        $first->setEndpoint('stubs_and_pages');
        $first->setArguments(
          array(
            'filter[section]=' => 'about-us',
            'filter[slug]=' =>'collections',
            'filter[landing_page]' => '1',
            'fields' => '*.*.*'
          )
        );
        $pages = $first->getData();

        $second = new DirectUs;
        $second->setEndpoint('collections');
        $second->setArguments(
          array(
            'fields' => '*.*.*',
            'sort' => 'collection_name'
          )
        );
        $collections = $second->getData();
        return view('collections.index', compact('collections', 'pages'));
    }

    public function details($slug)
    {
        $second = new DirectUs;
        $second->setEndpoint('collections');
        $second->setArguments(
          array(
            'fields' => '*.*.*.*',
            'filter[slug]=' => $slug
          )
        );
        $collection = $second->getData();
        return view('collections.details', compact('collection'));
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
