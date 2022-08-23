<?php

namespace App\Models;

use App\DirectUs;

class HighlightThemes extends Model
{
    protected static string $table = 'pharos_themes';
    /**
     * @return array
     */
    public static function list(): array
    {
      $api = new DirectUs(
          self::$table,
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
      $api = new DirectUs(
          'pharos',
          array(
              'fields' => '*.*.*',
              'meta' => '*',
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
      $api = new DirectUs(
          self::$table,
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
      $api = new DirectUs(
          self::$table,
          array(
              'fields' => '*.*.*',
              'meta' => 'result_count,total_count,type'
          )
      );
      return $api->getData();
    }
}
