<?php

namespace App\Models;

use App\DirectUs;

class AffiliateResearchers extends Model
{
    public static function list()
    {
      $api = new DirectUs;
      $api->setEndpoint('affiliate_researchers');
      $api->setArguments(
        $args = array(
            'fields' => '*.*.*.*',
            'meta' => 'result_count,total_count,type',
            'sort' => 'last_name'
        )
      );
      return $api->getData();
    }

    public static function find($slug)
    {
      $api = new DirectUs;
      $api->setEndpoint('affiliate_researchers');
      $api->setArguments(
        $args = array(
            'fields' => '*.*.*.*',
            'meta' => '*',
            'filter[slug][eq]' => $slug
        )
      );
      return $api->getData();
    }

    public static function findByDepartment(int $department)
    {
      $api = new DirectUs;
      $api->setEndpoint('affiliate_researchers');
      $api->setArguments(
        $args = array(
            'fields' => '*.*.*.*',
            'filter[departments_affiliated.department][in]' => $department,
        )
      );
      return $api->getData();
    }
}
