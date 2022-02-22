<?php

namespace App\Models;

use App\DirectUs;

class Departments extends Model
{
    /**
     * @return array
     */
    public static function list(): array
    {
      $api = new DirectUs();
      $api->setEndpoint('departments');
      $api->setArguments(
          array(
              'fields' => '*.*.*.*',
              'sort' => 'title',
              'meta' => '*'
          )
      );
      return $api->getData();
    }

    /**
     * @param string $slug
     * @return array
     */
    public static function find(string $slug): array
    {
      $api = new DirectUs();
      $api->setEndpoint('departments');
      $api->setArguments(
          array(
              'fields' => '*.*.*.*',
              'filter[slug][eq]' => $slug,
          )
      );
      return $api->getData();
    }
}
