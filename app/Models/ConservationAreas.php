<?php

namespace App\Models;

use App\DirectUs;

class ConservationAreas extends Model
{
    /**
     * @return array
     */
    public static function list(): array
    {
      $api = new DirectUs();
      $api->setEndpoint('conservation_areas');
      $api->setArguments(
          array(
            'fields' => '*.*.*.*.*',
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
      $api->setEndpoint('conservation_areas');
      $api->setArguments(
          array(
            'fields' => '*.*.*.*',
            'filter[slug][eq]' => $slug,
          )
      );
      return $api->getData();
    }
}
