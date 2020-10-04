<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\DirectUs;
use App\MoreLikeThis;
use App\FitzElastic\Elastic;
use Elasticsearch\ClientBuilder;

class socialController extends Controller
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

    public function instagram()
    {
        $api = $this->getApi();
        $api->setEndpoint('on_insta');
        $api->setArguments(
          $args = array(
              'fields' => '*.*.*.*',
              'meta' => '*'
          )
        );
        $insta = $api->getData();
        return view('social.insta', compact('insta'));
    }

    public function story($slug)
    {
        $api = $this->getApi();
        $api->setEndpoint('on_insta');
        $api->setArguments(
          $args = array(
              'fields' => '*.*.*.*',
              'meta' => '*',
              'filter[slug][eq]' => $slug
          )
        );
        $insta = $api->getData();
        $params = [
          'index' => 'ciim',
          'size' => 1,
          'body'  => [
            'query' => [
              'match' => [
                'identifier.accession_number' => strtoupper($insta['data'][0]['adlib_id'])
              ]
            ]
          ]
        ];
        $adlib = $this->getElastic()->setParams($params)->getSearch();
        $adlib = $adlib['hits']['hits'];
        return view('social.story', compact('insta', 'adlib'));
    }

}
