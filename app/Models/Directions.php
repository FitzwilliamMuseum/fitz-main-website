<?php

namespace App\Models;

use App\DirectUs;

class Directions extends Model
{
    /**
     * @return array
     */
    public static function list(): array
    {
      $api = new DirectUs;
      $api->setEndpoint('directions');
      $api->setArguments(
          array(
              'fields' => '*.*.*.*',
              'meta' => 'result_count,total_count,type',
              'sort' => '-id'
          )
      );
      return $api->getData();
    }
}
