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


  public function getElastic()
  {
    return new Elastic();
  }

  public function index()
  {
    $api = $this->getApi();
    $api->setEndpoint('podcast_series');
    $api->setArguments(
      $args = array(
        'fields' => '*.*.*.*',
        'meta' => 'result_count,total_count,type'
      )
    );
    $podcasts = $api->getData();
    return view('podcasts.index', compact('podcasts'));
  }

  public function getSeriesID($slug)
  {
    $api = $this->getApi();
    $api->setEndpoint('podcast_series');
    $api->setArguments(
      $args = array(
        'fields' => '*.*.*.*',
        'filter[slug][eq]' => $slug
      )
    );
    $podcasts = $api->getData();
    return $podcasts;
  }

  public function series($slug)
  {
    $ids = $this->getSeriesID($slug);
    $api = $this->getApi();
    $api->setEndpoint('podcast_archive');
    $api->setArguments(
      $args = array(
        'fields' => '*.*.*.*',
        'meta' => 'result_count,total_count,type',
        'filter[podcast_series.podcast_series_id][in]' => $ids['data'][0]['id']
      )
    );
    $podcasts = $api->getData();
    if(empty($podcasts['data'])){
      return response()->view('errors.404',[],404);
    }
    return view('podcasts.series', compact('podcasts'));
  }

  public function episode($slug)
  {
    $api = $this->getApi();
    $api->setEndpoint('podcast_archive');
    $api->setArguments(
      $args = array(
        'fields' => '*.*.*.*',
        'meta' => 'result_count,total_count,type',
        'filter[slug][eq]' => $slug
      )
    );
    $podcasts = $api->getData();
    if(empty($podcasts['data'])){
      return response()->view('errors.404',[],404);
    }
    return view('podcasts.episode', compact('podcasts'));
  }

  public function mindseyes(Request $request)
  {
    $api = $this->getApi();
    $api->setEndpoint('mindseye');
    $args = array(
      'fields' => '*.*.*.*',
      'meta' => 'result_count,total_count,type',
      'sort' => 'publish_time'
    );
    if($request->has('access') && in_array($request['access'],
    array('marlay-group', 'staff'))) {
      $args['filter[publish_time][gte]'] = '2020-10-23';
    } else {
      $args['filter[publish_time][lte]'] = 'now';
    }
    $api->setArguments(
      $args
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
        'meta' => 'result_count,total_count,type',
        'filter[slug][eq]' => $slug
      )
    );
    $mindseye = $api->getData();
    if(empty($mindseye['data'])){
      return response()->view('errors.404',[],404);
    }
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

    $mlt = new MoreLikeThis;
    $mlt->setLimit(3)->setType('podcasts')->setQuery($slug);
    $suggest = $mlt->getData();

    return view('podcasts.mindseye', compact('mindseye', 'adlib', 'suggest'));
  }

}
