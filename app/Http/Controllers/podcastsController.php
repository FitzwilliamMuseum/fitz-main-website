<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\DirectUs;
use App\MoreLikeThis;
use App\FitzElastic\Elastic;
use Elasticsearch\ClientBuilder;

class podcastsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


     public function getApi(){
       return new DirectUs;
     }

     public function getElastic()
     {
       return new Elastic();
     }

    public function index()
    {
      return view('podcasts.index');
    }
    
    public function mindseyes()
    {
        $api = $this->getApi();
        $api->setEndpoint('mindseye');
        $api->setArguments(
          $args = array(
              'fields' => '*.*.*.*',
              'meta' => '*'
          )
        );
        $mindseyes = $api->getData();
        return view('podcasts.mindseyes', compact('mindseyes'));
    }

    public function mindseye($slug)
    {
        $api = $this->getApi();
        $api->setEndpoint('mindseye');
        $api->setArguments(
          $args = array(
              'fields' => '*.*.*.*',
              'meta' => '*',
              'filter[slug][eq]' => $slug
          )
        );
        $mindseye = $api->getData();
        $params = [
          'index' => 'ciim',
          'size' => 1,
          'body'  => [
            'query' => [
              'match' => [
                'identifier.accession_number' => strtoupper($mindseye['data'][0]['adlib_id'])
              ]
            ]
          ]
        ];
        $adlib = $this->getElastic()->setParams($params)->getSearch();
        $adlib = $adlib['hits']['hits'];
        return view('podcasts.mindseye', compact('mindseye', 'adlib'));
    }

}
