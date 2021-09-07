<?php

namespace App\Models;

use App\DirectUs;

class ResearchOpportunities extends Model
{
    public static function list()
    {
      $api = new DirectUs();
      $api->setEndpoint('research_opportunities');
      $api->setArguments(
        $args = array(
            'fields' => '*.*.*.*',
            'meta' => 'result_count,total_count,type',
            'sort' => 'id'
        )
      );
      return $api->getData();
    }

    public static function find(string $slug)
    {
      $api = new DirectUs();
      $api->setEndpoint('research_opportunities');
      $api->setArguments(
        $args = array(
            'fields' => '*.*.*.*',
            'meta' => 'result_count,total_count,type',
            'filter[slug][eq]' => $slug
        )
      );
      return $api->getData();
    }
}
