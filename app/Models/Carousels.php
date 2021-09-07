<?php

namespace App\Models;

use App\DirectUs;

class Carousels extends Model
{
    public static function findByID(int $id)
    {

    }

    public static function findBySection(string $section)
    {
      $api = new DirectUs;
      $api->setEndpoint('carousels');
      $api->setArguments(
        $args = array(
            'fields' => '*.*.*.*',
            'meta' => 'result_count,total_count,type',
            'filter[section][eq]' => $section,
            'single' => '1',
            'sort' => '-id'
        )
      );
      return $api->getData();
    }

    public static function list()
    {

    }
}
