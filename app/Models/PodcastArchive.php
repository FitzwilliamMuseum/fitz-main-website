<?php

namespace App\Models;

use App\DirectUs;

class PodcastArchive extends Model
{
    public static function find(string $id)
    {
      $api = new DirectUs;
      $api->setEndpoint('podcast_archive');
      $api->setArguments(
        $args = array(
          'fields' => '*.*.*.*',
          'meta' => '*',
          'filter[podcast_series.podcast_series_id][in]' => $id,
        )
      );
      return $api->getData();
    }

    public static function findByEpisode(string $slug)
    {
      $api = new DirectUs;
      $api->setEndpoint('podcast_archive');
      $api->setArguments(
        $args = array(
          'fields' => '*.*.*.*',
          'meta' => '*',
          'filter[slug][eq]' => $slug
        )
      );
      return $api->getData();
    }
}
