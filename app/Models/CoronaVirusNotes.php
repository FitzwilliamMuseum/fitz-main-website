<?php

namespace App\Models;

use App\DirectUs;

class CoronaVirusNotes extends Model
{
    public static function list()
    {
      $api = new Directus;
      $api->setEndpoint('coronavirus_notes');
      $api->setArguments(
        $args = array(
            'fields' => '*.*.*.*',
            'meta' => '*',
            'sort' => 'id',
        )
      );
      return $api->getData();
    }
}
