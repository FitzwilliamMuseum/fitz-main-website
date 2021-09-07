<?php

namespace App\Models;

use App\DirectUs;

class StoryTelling extends Model
{
    public static function list()
    {
      $api = new DirectUs;
      $api->setEndpoint('story_telling');
      $api->setArguments(
        $args = array(
          'fields' => '*.*.*.*',
          'meta' => 'result_count,total_count,type'
        )
      );
      return $api->getData();
    }
}
