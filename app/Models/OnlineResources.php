<?php

namespace App\Models;

use App\DirectUs;

class OnlineResources extends Model
{
    public static function list()
    {
      $api = new DirectUs;
      $api->setEndpoint('online_resources');
      $api->setArguments(
        $args = array(
            'fields' => '*.*.*.*',
            'limit' => 100,
            'meta' => '*',
            'sort' => 'id'
        )
      );
      return $api->getData();
    }

    public static function find(string $slug)
    {
      $api = new DirectUs;
      $api->setEndpoint('online_resources');
      $api->setArguments(
        $args = array(
            'fields' => '*.*.*.*',
            'meta' => 'result_count,total_count,type',
            'filter[slug][eq]' => $slug
        )
      );
      return $api->getData();
    }
}
