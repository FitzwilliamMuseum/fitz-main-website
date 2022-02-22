<?php

namespace App\Models;

use App\DirectUs;

class FundRaising extends Model
{
    /**
     * @param int $limit
     * @return array
     */
    public static function list(int $limit = 3): array
    {
      $api = new DirectUs;
      $api->setEndpoint('fundraising');
      $api->setArguments(
          array(
              'fields' => '*.*.*.*',
              'meta' => '*',
              'limit' => $limit
          )
      );
      return $api->getData();
    }
}
