<?php

namespace App;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Carbon\Carbon;
use Solarium\Client;
use Solarium\Core\Client\Adapter\Curl;
use Symfony\Component\EventDispatcher\EventDispatcher;
use Solarium\Exception;

class WordpressSchoolsImporter {

  protected  $_url;

  public function setUrl($url){
    $this->_url = $url;
    return $this;
  }

  public function getUrl()
  {
    return $this->_url;
  }

  public function getData(){
    $url = $this->getUrl();
    $response = Http::get($url);
    dump($response->status());
    $data = $response->json();
    return $data;
  }

  public function solrImport($data, $subdomain)
  {
      $configSolr = \Config::get('solarium');
      $this->client = new Client(new Curl(), new EventDispatcher(), $configSolr);
      $update = $this->client->createUpdate();
      $documents = array();
      foreach($data as $wordpressPage)
      {
        $doc = $update->createDocument();
        $doc->id = md5($wordpressPage['id']) . '-wordpress-' . $subdomain;
        $doc->title = strip_tags($wordpressPage['title']['rendered']);
        $doc->description = str_replace(array("\r", "\n"), '', strip_tags($wordpressPage['excerpt']['rendered']));
        $doc->body = str_replace(array("\r", "\n"), '',strip_tags($wordpressPage['content']['rendered']));
        $doc->slug = $wordpressPage['slug'];
        $doc->url = $wordpressPage['link'];
        $doc->contentType = 'schools';
        if(isset($wordpressPage["_embedded"])){
          $doc->thumbnail = $wordpressPage["_embedded"]["wp:featuredmedia"][0]["media_details"]['sizes']['thumbnail']['source_url'];
          $doc->image =  $wordpressPage["_embedded"]["wp:featuredmedia"][0]["source_url"];
          $doc->searchImage =  $wordpressPage["_embedded"]["wp:featuredmedia"][0]["media_details"]['sizes']['thumbnail']['source_url'];
        }
        $documents[] = $doc;
      }
      //dump($documents);
      $update->addDocuments($documents);
      $update->addCommit();
      return $this->client->update($update);
  }

  public function import($subdomain)
  {
    $data = $this->getData();
    return $this->solrImport($data, $subdomain);
  }
}
