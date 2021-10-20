<?php

namespace App\Models;

use App\DirectUs;

class AssociatedPeople extends Model
{
  public static function list()
  {
    $api = new DirectUs;
    $api->setEndpoint('associated_people');
    $api->setArguments(
      array(
        'fields' => '*.*.*.*',
        'sort' => 'surname'
      )
    );
    return $api->getData();
  }

  public static function find(string $slug)
  {
    $api = new DirectUs;
    $api->setEndpoint('associated_people');
    $api->setArguments(
      $args = array(
          'fields' => '*.*.*.*.*',
          'meta' => '*',
          'filter[slug][eq]' => $slug,
      )
    );
    return $api->getData();
  }
}
