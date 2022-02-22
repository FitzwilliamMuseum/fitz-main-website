<?php

namespace App\Models;

use App\DirectUs;

class Transport extends Model
{
    /**
     * @return array
     */
    public static function list(): array
    {
      $api = new Directus;
      $api->setEndpoint('transport');
      $api->setArguments(
          array(
              'fields' => '*.*.*.*',
              'meta' => '*',
              'sort' => 'id',
          )
      );
      return $api->getData();
    }
}
