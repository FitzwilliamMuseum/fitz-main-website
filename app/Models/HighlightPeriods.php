<?php

namespace App\Models;

use App\DirectUs;

class HighlightPeriods extends Model
{
    /**
     * @param string $period
     * @return array
     */
    public static function find(string $period): array
    {
      $api = new DirectUs;
      $api->setEndpoint('pharos_periods');
      $api->setArguments(
          array(
              'fields' => '*.*.*.*.*.*',
              'meta' => 'result_count,total_count,type',
              'filter[slug][like]' => $period
          )
      );
      return $api->getData();
    }
}
