<?php

namespace App\Models;

use App\DirectUs;

class HomePage extends Model
{
    /**
     * @return array
     */
    public static function find(): array
    {
      $api = new DirectUs;
      $api->setEndpoint('home_page_config');
      $api->setArguments(
          array(
              'fields' => '*.*.*.*',
              'meta' => '*',
              'sort' => '-id'
          )
      );
      return $api->getData()['data'][0];
    }
}
