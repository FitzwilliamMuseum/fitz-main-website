<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\DirectUs;

class Collections extends Model
{
    /**
     * @return array
     */
    public static function list(): array
    {
      $api = new DirectUs();
      $api->setEndpoint('collections');
      $api->setArguments(
        array(
          'fields' => '*.*.*',
          'sort' => 'collection_name'
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
      $api->setEndpoint('collections');
      $api->setArguments(
        array(
          'fields' => '*.*.*.*.*',
          'filter[slug]=' => $slug
        )
      );
      return $api->getData();
    }
}
