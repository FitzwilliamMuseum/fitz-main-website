<?php

namespace App\Models;

use App\DirectUs;

class HighlightPeriods extends Model
{
    public static function list()
    {

    }

    public static function find(string $period)
    {
      $api = new DirectUs;
      $api->setEndpoint('pharos_periods');
      $api->setArguments(
        $args = array(
            'fields' => '*.*.*.*.*.*',
            'meta' => 'result_count,total_count,type',
            'filter[slug][like]' => $period
        )
      );
      return $api->getData();
    }
}
