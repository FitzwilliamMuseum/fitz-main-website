<?php

namespace App\Models;

use App\DirectUs;

class PodcastArchive extends Model
{
    /**
     * @param string $id
     * @return array
     */
    public static function find(string $id):array
    {
      $api = new DirectUs;
      $api->setEndpoint('podcast_archive');
      $api->setArguments(
          array(
            'fields' => '*.*.*.*',
            'meta' => '*',
            'filter[podcast_series.podcast_series_id][in]' => $id,
          )
      );
      return $api->getData();
    }

    /**
     * @param string $slug
     * @return array
     */
    public static function findByEpisode(string $slug): array
    {
      $api = new DirectUs;
      $api->setEndpoint('podcast_archive');
      $api->setArguments(
          array(
            'fields' => '*.*.*.*',
            'meta' => '*',
            'filter[slug][eq]' => $slug
          )
      );
      return $api->getData();
    }
}
