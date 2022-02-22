<?php

namespace App\Models;

use App\DirectUs;

class LookThinkDo extends Model
{
    /**
     * @return array
     */
    public static function list(): array
    {
      $api = new DirectUs;
      $api->setEndpoint('look_think_do');
      $api->setArguments(
          array(
            'fields' => '*.*.*.*',
            'filter[publication_date][lte]' => 'now',
            'meta' => 'result_count,total_count,type'
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
      $api = new DirectUs();
      $api->setEndpoint('look_think_do');
      $api->setArguments(
          array(
            'fields' => '*.*.*.*',
            'meta' => 'result_count,total_count,type',
            'filter[publication_date][lte]' => 'now',
            'filter[slug][eq]' => $slug
          )
      );
      return $api->getData();
    }
}
