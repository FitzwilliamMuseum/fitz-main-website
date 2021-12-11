<?php

namespace App\Models;

use App\DirectUs;

class HomePage extends Model
{
    public static function find()
    {
      $api = new DirectUs;
      $api->setEndpoint('home_page_config');
      $api->setArguments(
        $args = array(
            'fields' => '*.*.*.*',
            'meta' => '*',
            'sort' => '-id'
        )
      );
      return $api->getData()['data'][0];
    }
}
