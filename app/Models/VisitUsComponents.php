<?php

namespace App\Models;

use App\DirectUs;

class VisitUsComponents extends Model
{
    public static function find($id)
    {
      $api = new Directus;
      $api->setEndpoint('visit_us_components');
      $api->setArguments(
        $args = array(
            'fields' => '*.*.*.*',
            'meta' => '*',
            'sort' => 'id',
            'filter[id][eq]' => $id
        )
      );
      return $api->getData();
    }
}
