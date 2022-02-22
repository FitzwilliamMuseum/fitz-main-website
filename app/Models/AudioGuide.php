<?php

namespace App\Models;

use App\DirectUs;

class AudioGuide extends Model
{
    /**
     * @return array
     */
    public static function list(): array
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

    /**
     * @param string $slug
     * @return array
     */
    public static function find(string $slug): array
    {
      $api = new DirectUs;
      $api->setEndpoint('audio_guide');
      $api->setArguments(
          array(
              'fields' => '*.*.*.*.*',
              'meta' => 'result_count,total_count,type',
              'filter[slug][eq]' => $slug,
          )
      );
      return $api->getData();
    }
}
