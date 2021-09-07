<?php

namespace App\Models;

use App\DirectUs;

class Departments extends Model
{
    public static function list()
    {
      $api = new DirectUs();
      $api->setEndpoint('departments');
      $api->setArguments(
        $args = array(
            'fields' => '*.*.*.*',
            'sort' => 'title',
            'meta' => '*'
        )
      );
      return $api->getData();
    }

    public static function find(string $slug)
    {
      $api = new DirectUs();
      $api->setEndpoint('departments');
      $api->setArguments(
        $args = array(
            'fields' => '*.*.*.*',
            'filter[slug][eq]' => $slug,
        )
      );
      return $api->getData();
    }
}
