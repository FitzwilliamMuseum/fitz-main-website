<?php

namespace App\Models;

use App\DirectUs;

class PodcastSeries extends Model
{
    public static function list()
    {
      $api = new DirectUs;
      $api->setEndpoint('podcast_series');
      $api->setArguments(
        $args = array(
          'fields' => '*.*.*.*.*.*',
          'meta' => '*',
          'sort' => '-id'
        )
      );
      return $api->getData();
    }

    public static function getSeriesID($slug)
    {
      $api = new DirectUs;
      $api->setEndpoint('podcast_series');
      $api->setArguments(
        $args = array(
          'fields' => '*.*.*.*',
          'filter[slug][eq]' => $slug
        )
      );
      return $api->getData();
    }
}
