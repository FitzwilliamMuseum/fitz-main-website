<?php

namespace App\Models;

use App\DirectUs;

class PodcastSeries extends Model
{
    /**
     * @return array
     */
    public static function list(): array
    {
      $api = new DirectUs;
      $api->setEndpoint('podcast_series');
      $api->setArguments(
          array(
            'fields' => '*.*.*.*.*.*',
            'meta' => '*',
            'sort' => '-id'
          )
      );
      return $api->getData();
    }

    /**
     * @param string $slug Slug
     * @return array
     */
    public static function getSeriesID(string $slug): array
    {
      $api = new DirectUs;
      $api->setEndpoint('podcast_series');
      $api->setArguments(
          array(
            'fields' => '*.*.*.*',
            'filter[slug][eq]' => $slug
          )
      );
      return $api->getData();
    }
}
