<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\DirectUs;

class Collections extends Model
{
    public static function list()
    {
      $api = new DirectUs();
      $api->setEndpoint('collections');
      $api->setArguments(
        array(
          'fields' => '*.*.*',
          'sort' => 'collection_name'
        )
      );
      return $api->getData();
    }

    public static function find(string $slug){
      $api = new DirectUs();
      $api->setEndpoint('collections');
      $api->setArguments(
        array(
          'fields' => '*.*.*.*.*',
          'filter[slug]=' => $slug
        )
      );
      return $api->getData();
    }
}
