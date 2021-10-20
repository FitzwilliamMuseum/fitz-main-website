<?php

namespace App\Models;

use App\DirectUs;

class Podcasting extends Model
{
  public static function list(Request $request)
  {
    $api = new DirectUs;
    $api->setEndpoint('mindseye');
    $args = array(
      'fields' => '*.*.*.*',
      'meta' => 'result_count,total_count,type',
      'sort' => 'publish_time'
    );
    if($request->has('access') && in_array($request['access'],
    array('preview', 'staff'))) {
      $args['filter[publish_time][gte]'] = '2020-10-23';
    } else {
      $args['filter[publish_time][lte]'] = 'now';
    }
    $api->setArguments(
      $args
    );
    return $api->getData();
  }

  public static function find(string $slug)
  {
    $api = new DirectUs;
    $api->setEndpoint('podcasting');
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
