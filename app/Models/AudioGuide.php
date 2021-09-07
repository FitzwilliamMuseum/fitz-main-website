<?php

namespace App\Models;

use App\DirectUs;

class AudioGuide extends Model
{
    public static function list()
    {
      $api = new DirectUs;
      $api->setEndpoint('audio_guide');
      $api->setArguments(
        array(

          'fields' => '*.*.*.*',
          'sort' => 'stop_number'
        )
      );
      return $api->getData();
    }

    public static function find(string $slug)
    {
      $api = new DirectUs;
      $api->setEndpoint('audio_guide');
      $api->setArguments(
        $args = array(
            'fields' => '*.*.*.*.*',
            'meta' => 'result_count,total_count,type',
            'filter[slug][eq]' => $slug,
        )
      );
      return $api->getData();
    }
}
