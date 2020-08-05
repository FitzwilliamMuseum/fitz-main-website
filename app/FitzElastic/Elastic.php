<?php

namespace App\FitzElastic;
use Illuminate\Support\Facades\Cache;
use Elasticsearch\ClientBuilder;

class Elastic {

  protected $_params;

  protected $_key = '';

  public function getHosts()
  {
    $hosts = [
      [
      'scheme' => env('ELASTIC_SCHEME'),
      'host' => env('ELASTIC_API'),
      'path' => env('ELASTIC_PATH'),
      'port' => 80
      ]
    ];
    return $hosts;
  }

  public function getElasticClient(){
    $client = ClientBuilder::create()->setHosts($this->getHosts())->build();
    return $client;
  }

  public function setParams($params){
    $this->_params = $params;
    return $this;
  }

  public function getParams(){
    return $this->_params;
  }

  public function getKey(){
    return md5(json_encode($this->getParams()));
  }

  public function getCount()
  {
    $data = $this->getElasticClient()->count($this->getParams());
    return $data;
  }

  public function getSearch()
  {
    $key = $this->getKey();
    $expiresAt = now()->addMinutes(60);
    if (Cache::has($key)) {
      $data = Cache::get($key);
    } else {
      $data = $this->getElasticClient()->search($this->getParams());
      Cache::put($key, $data, $expiresAt);
    }
    return $data;
  }

}
