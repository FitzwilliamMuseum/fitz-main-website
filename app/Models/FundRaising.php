<?php

namespace App\Models;

use App\DirectUs;

class FundRaising extends Model
{
    public static function list(int $limit = 3)
    {
      $api = new DirectUs;
      $api->setEndpoint('fundraising');
      $api->setArguments(
        $args = array(
            'fields' => '*.*.*.*',
            'meta' => '*',
            'limit' => 3
        )
      );
      return $api->getData();
    }
}
