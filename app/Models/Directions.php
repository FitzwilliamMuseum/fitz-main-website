<?php

namespace App\Models;

use App\DirectUs;

class Directions extends Model
{
    public static function list()
    {
      $api = new DirectUs;
      $api->setEndpoint('directions');
      $api->setArguments(
        $args = array(
            'fields' => '*.*.*.*',
            'meta' => 'result_count,total_count,type',
            'sort' => '-id'
        )
      );
      return $api->getData();
    }
}
