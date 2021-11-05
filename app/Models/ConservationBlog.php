<?php

namespace App\Models;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ConservationBlog extends Model
{


  public static function getData(){
    $url = 'https://conservation.fitzmuseum.cam.ac.uk/wp-json/wp/v2/posts/?_embed&per_page=9';
    $response = Http::get($url);
    $data = $response->json();
    return $data;
  }

  public static function list(){
    $data = self::getData();
    $records = array();
    foreach($data as $wordpressPage)
    {
      $record['title'] = strip_tags($wordpressPage['title']['rendered']);
      $record['url'] = $wordpressPage['link'];
      if(isset($wordpressPage["_embedded"])){
        $record['image'] =  $wordpressPage["_embedded"]["wp:featuredmedia"][0]["media_details"]['sizes']['thumbnail']['source_url'];
      }
      $records[] = $record;
    }
    return $records;
  }
}
