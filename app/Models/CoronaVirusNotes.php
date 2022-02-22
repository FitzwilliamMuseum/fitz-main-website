<?php

namespace App\Models;

use App\DirectUs;

class CoronaVirusNotes extends Model
{
    /**
     * @return array
     */
    public static function list(): array
    {
      $api = new Directus;
      $api->setEndpoint('coronavirus_notes');
      $api->setArguments(
          array(
              'fields' => '*.*.*.*',
              'meta' => '*',
              'sort' => 'id',
          )
      );
      return $api->getData();
    }
}
