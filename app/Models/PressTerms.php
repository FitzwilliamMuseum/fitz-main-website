<?php

namespace App\Models;

use App\DirectUs;

class PressTerms extends Model
{
  public static function list()
  {
    $api = new DirectUs;
    $api->setEndpoint('press_terms');
    $api->setArguments(
      array(
        'fields' => '*.*.*.*',
      )
    );
    return $api->getData();
  }
}
