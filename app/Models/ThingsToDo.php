<?php

namespace App\Models;

use App\DirectUs;

class ThingsToDo extends Model
{
    /**
     * @return array
     */
    public static function list(): array
    {
      $api = new DirectUs;
      $api->setEndpoint('things_to_do');
      $api->setArguments(
          array(
              'fields' => '*.*.*.*',
              'meta' => '*',
              'sort' => '?',
              'limit' => 3
          )
      );
      return $api->getData();
    }

    public static function listAll($limit = 100): array
    {
      $api = new DirectUs;
      $api->setEndpoint('things_to_do');
      $api->setArguments(
          array(
              'fields' => '*.*.*.*',
              'meta' => '*',
              'sort' => 'title',
              'limit' => $limit
          )
      );
      return $api->getData();
    }

}
