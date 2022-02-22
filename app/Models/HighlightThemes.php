<?php

namespace App\Models;

use App\DirectUs;

class HighlightThemes extends Model
{
    /**
     * @return array
     */
    public static function list(): array
    {
      $api = new DirectUs;
      $api->setEndpoint('pharos_themes');
      $api->setArguments(
          array(
              'fields' => '*.*.*',
              'meta' => 'result_count,total_count,type'
          )
      );
      return $api->getData();
    }

    /**
     * @param string $theme
     * @return array
     */
    public static function find(string $theme):array
    {
      $api = new DirectUs;
      $api->setEndpoint('pharos');
      $api->setArguments(
          array(
              'fields' => '*.*.*',
              'meta' => 'result_count,total_count,type',
              'filter[themes][contains]' => $theme,
          )
      );
      return $api->getData();
    }

    /**
     * @param string $theme
     * @return array
     */
    public static function getDetails(string $theme): array
    {
      $api = new DirectUs;
      $api->setEndpoint('pharos_themes');
      $api->setArguments(
          array(
              'fields' => '*.*.*.*.*.*',
              'meta' => 'result_count,total_count,type',
              'filter[slug][eq]' => $theme,
              'limit' => 1
          )
      );
      return $api->getData();
    }

    /**
     * @return array
     */
    public static function getThemes(): array
    {
      $api = new DirectUs;
      $api->setEndpoint('pharos_themes');
      $api->setArguments(
          array(
              'fields' => '*.*.*',
              'meta' => 'result_count,total_count,type'
          )
      );
      return $api->getData();
    }
}
