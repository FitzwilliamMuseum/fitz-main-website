<?php

namespace App\Models;

use App\DirectUs;

class LookThinkDo extends Model
{
    public static function list()
    {
      $api = new DirectUs;
      $api->setEndpoint('look_think_do');
      $api->setArguments(
        $args = array(
          'fields' => '*.*.*.*',
          'filter[publication_date][lte]' => 'now',
          'meta' => 'result_count,total_count,type'
        )
      );
      return $api->getData();
    }

    public static function find(string $slug)
    {
      $api = new DirectUs();
      $api->setEndpoint('look_think_do');
      $api->setArguments(
        $args = array(
          'fields' => '*.*.*.*',
          'meta' => 'result_count,total_count,type',
          'filter[publication_date][lte]' => 'now',
          'filter[slug][eq]' => $slug
        )
      );
      return $api->getData();
    }
}
