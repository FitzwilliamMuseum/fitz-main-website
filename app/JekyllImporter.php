<?php

namespace App;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Carbon\Carbon;
use App\JekyllImporter;
use Solarium\Client;
use Solarium\Core\Client\Adapter\Curl;
use Symfony\Component\EventDispatcher\EventDispatcher;
use Solarium\Exception;

class JekyllImporter {

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
    if($url === 'https://beyondthelabel.fitzmuseum.cam.ac.uk/data.json'){
      dump($response->json());
    }
    return $data;
  }

  public function solrImport($data, $subdomain)
  {
      $configSolr = \Config::get('solarium');
      $this->client = new Client(new Curl(), new EventDispatcher(), $configSolr);
      $update = $this->client->createUpdate();
      $documents = array();
      foreach($data as $jekyllPage)
      {
        $doc = $update->createDocument();
        $doc->id = md5($jekyllPage['title']) . '-jekyll-' . $subdomain;
        $doc->title = $jekyllPage['title'];
        $doc->description = $jekyllPage['summary'];
        $doc->body = $jekyllPage['content'];
        $doc->slug = $jekyllPage['slug'];
        $doc->url = $jekyllPage['url'];
        $doc->contentType = 'research-resource';
        if(isset($jekyllPage['image'])){
          $doc->thumbnail = $jekyllPage['thumbnail'];
          $doc->image =  $jekyllPage['image'];
          $doc->searchImage =  $jekyllPage['thumbnail'];
        }
        $documents[] = $doc;
      }
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
