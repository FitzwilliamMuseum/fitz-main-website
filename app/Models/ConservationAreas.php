<?php

namespace App\Models;

use App\DirectUs;

class ConservationAreas extends Model
{
    public static function list()
    {
      $api = new DirectUs();
      $api->setEndpoint('conservation_areas');
      $api->setArguments(
        $args = array(
          'fields' => '*.*.*.*.*',
        )
      );
      return $api->getData();
    }

    public static function find(string $slug)
    {
      $api = new DirectUs;
      $api->setEndpoint('conservation_areas');
      $api->setArguments(
        $args = array(
          'fields' => '*.*.*.*',
          'filter[slug][eq]' => $slug,
        )
      );
      return $api->getData();
    }
}
