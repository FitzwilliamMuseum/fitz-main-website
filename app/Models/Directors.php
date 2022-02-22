<?php

namespace App\Models;

use App\DirectUs;

class Directors extends Model
{
    /**
     * @return array
     */
    public static function getDirectors(): array
    {
      $directus = new DirectUs();
      $directus->setEndpoint('directors');
      return $directus->getData();
    }

    /**
     * @param string $slug
     * @return array
     */
    public static function getDirector(string $slug): array
    {
      $directus = new DirectUs();
      $directus->setEndpoint('directors');
      $directus->setArguments(
          array(
            'fields' => '*.*.*',
            'meta' => '*',
            'filter[slug][eq]' => $slug
          )
      );
      return $directus->getData();
    }
}
