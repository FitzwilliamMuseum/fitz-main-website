<?php

namespace App\Models;

use App\DirectUs;

class Transport extends Model
{
    public static function list()
    {
      $api = new Directus;
      $api->setEndpoint('transport');
      $api->setArguments(
        $args = array(
            'fields' => '*.*.*.*',
            'meta' => '*',
            'sort' => 'id',
        )
      );
      return $api->getData();
    }
}
