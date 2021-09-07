<?php

namespace App\Models;

use App\DirectUs;

class Directors extends Model
{
    public static function getDirectors(){
      $directus = new DirectUs();
      $directus->setEndpoint('directors');
      return $directus->getData();
    }

    public static function getDirector(string $slug){
      $directus = new DirectUs();
      $directus->setEndpoint('directors');
      $directus->setArguments(
        $args = array(
          'fields' => '*.*.*',
          'meta' => '*',
          'filter[slug][eq]' => $slug
        )
      );
      return $directus->getData();
    }
}
