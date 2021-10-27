<?php

namespace App\Models;

use App\DirectUs;

class TessituraFacilities extends Model
{
  public static function listIds()
  {
    $api = new DirectUs;
    $api->setEndpoint('tessitura_facilities');
    $api->setArguments(
      $args = array(
          'fields' => 'facility_id',
          'meta' => '*'
        )
    );
    return $api->getData()['data'];
  }
}
