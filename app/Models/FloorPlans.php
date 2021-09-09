<?php

namespace App\Models;

use App\DirectUs;

class FloorPlans extends Model
{
    public static function list()
    {
      $api = new Directus;
      $api->setEndpoint('floorplans_guides');
      $api->setArguments(
        $args = array(
            'fields' => '*.*.*.*',
            'meta' => 'result_count,total_count,type',
            'sort' => 'id',
            '[filter][type][eq]' => 'floor_plan',
        )
      );
      return $api->getData();
    }
}
