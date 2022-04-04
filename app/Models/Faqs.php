<?php

namespace App\Models;

use App\DirectUs;

class Faqs extends Model
{

    public static function list(string $section ):array
    {
      $api = new DirectUs;
      $api->setEndpoint('faqs');
      $api->setArguments(
          array(
              'fields' => '*',
              'filter[section][eq]' => $section,
              'meta' => '*'
          )
      );
      return $api->getData()['data'];
    }


}
