<?php

namespace App\Models;

use App\DirectUs;

class GalleryFamilyActivities extends Model
{
    public static function list()
    {
      $api = new DirectUs;
      $api->setEndpoint('gallery_family_activities');
      $api->setArguments(
        $args = array(
          'fields' => '*.*.*.*',
          'meta' => '',
        )
      );
      return $api->getData();
    }
}
