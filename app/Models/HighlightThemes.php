<?php

namespace App\Models;

use App\DirectUs;

class HighlightThemes extends Model
{
    public static function list(){
      $api = new DirectUs;
      $api->setEndpoint('pharos_themes');
      $api->setArguments(
        $args = array(
            'fields' => '*.*.*',
            'meta' => 'result_count,total_count,type'
        )
      );
      return $api->getData();
    }

    public static function find(string $theme)
    {
      $api = new DirectUs;
      $api->setEndpoint('pharos');
      $api->setArguments(
        $args = array(
            'fields' => '*.*.*',
            'meta' => 'result_count,total_count,type',
            'filter[themes][contains]' => $theme,
        )
      );
      return $api->getData();
    }

    public static function getDetails(string $theme)
    {
      $api = new DirectUs;
      $api->setEndpoint('pharos_themes');
      $api->setArguments(
        $args = array(
            'fields' => '*.*.*.*.*.*',
            'meta' => 'result_count,total_count,type',
            'filter[slug][eq]' => $theme,
            'limit' => 1
        )
      );
      return $api->getData();
    }

    public static function getThemes()
    {
      $api = new DirectUs;
      $api->setEndpoint('pharos_themes');
      $api->setArguments(
        $args = array(
            'fields' => '*.*.*',
            'meta' => 'result_count,total_count,type'
        )
      );
      return $api->getData();
    }
}
