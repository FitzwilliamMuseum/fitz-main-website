<?php

namespace App;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Collection;
use Illuminate\Pagination\LengthAwarePaginator;
use Cache;

class DirectUs {

  public $_directUsUrl = 'https://content.fitz.ms/fitz-website/items/';

  public $_endpoint = '';

  public function getDirectUsUrl(){
    return $this->_directUsUrl;
  }

  public function setEndpoint($endpoint){
    $this->_endpoint = $endpoint . '?';
    return $this->_endpoint;
  }

  public function getEndPoint(){
    return $this->_endpoint;
  }

  protected $_params;

  protected $_meta = 'meta=total_count,result_count';

  protected $_fields = '*.*.*';

  public function setFields($fields){
    $this->_fields = $fields;
    return $this->fields;
  }

  public function getFields(){
    return $this->_fields;
  }

  public function getMeta()
  {
    return $this->_meta;
  }

  public $_args = array();

  public function setArguments($args){
    $this->_args = $args;
    return $this;
  }

  public function getArgs()
  {
    return $this->_args;
  }

  public function buildQuery()
  {
      return http_build_query($this->getArgs());
  }


  public function getCallUrl()
  {
      return $this->getDirectUsUrl() . $this->getEndPoint() . $this->buildQuery();
  }

  public function getData(){

    $url = $this->getDirectUsUrl() . $this->getEndPoint() . $this->buildQuery();
    // dd($url);
    $key = md5($url);
    $expiresAt = now()->addMinutes(60);
    if (Cache::has($key)) {
      $data = Cache::get($key);
    } else {
      $response = Http::get($url);
      $data = $response->json();
      Cache::put($key, $data, $expiresAt);
    }
    // if(empty($data['data'])){
    //   abort(404);
    // }
    return $data;
  }
}
