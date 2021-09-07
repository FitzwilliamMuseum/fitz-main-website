<?php

namespace App\Models;

use App\DirectUs;

class Galleries extends Model
{
    public static function list(int $limit = 100, string $sort = 'id')
    {
      $api = new DirectUs;
      $api->setEndpoint('galleries');
      $api->setArguments(
        $args = array(
            'fields' => '*.*.*.*',
            'meta' => 'result_count,total_count,type',
            'limit' => $limit,
            'sort' => $sort
        )
      );
      return $api->getData();
    }

    public static function find(string $slug)
    {
      $api = new DirectUs;
      $api->setEndpoint('galleries');
      $api->setArguments(
        $args = array(
            'fields' => '*.*.*.*',
            'filter[slug]' => $slug,
            'meta' => '*'
        )
      );
      return $api->getData();
    }
}
