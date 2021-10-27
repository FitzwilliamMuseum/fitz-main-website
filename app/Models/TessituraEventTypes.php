<?php

namespace App\Models;

use App\DirectUs;

class TessituraEventTypes extends Model
{
  public static function listIds()
  {
    $api = new DirectUs;
    $api->setEndpoint('tessitura_event_types');
    $api->setArguments(
      $args = array(
          'fields' => 'event_id',
          'meta' => '*'
        )
    );
    return $api->getData()['data'];
  }
}
