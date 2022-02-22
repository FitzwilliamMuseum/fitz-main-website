<?php

namespace App\Models;

use App\DirectUs;

class VisitUsComponents extends Model
{
    /**
     * @param int $id
     * @return array
     */
    public static function find(int $id): array
    {
      $api = new Directus;
      $api->setEndpoint('visit_us_components');
      $api->setArguments(
          array(
              'fields' => '*.*.*.*',
              'meta' => '*',
              'sort' => 'id',
              'filter[id][eq]' => $id
          )
      );
      return $api->getData();
    }
}
