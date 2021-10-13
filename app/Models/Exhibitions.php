<?php

namespace App\Models;

use App\DirectUs;

class Exhibitions extends Model
{
    public static function list(string $status = 'current', string $sort = '-ticketed', string $type = 'exhibition', int $limit = 100 )
    {
      $api = new DirectUs;
      $api->setEndpoint('exhibitions');
      $api->setArguments(
        $args = array(
            'fields' => '*.*.*.*',
            'filter[exhibition_status][eq]' => $status,
            'filter[type][eq]' => $type,
            'meta' => '*',
            'sort' => $sort,
            'limit' => $limit
        )
      );
      return $api->getData();
    }

    public static function listFuture(string $status = 'future', string $sort = '-ticketed', int $limit = 100 )
    {
      $api = new DirectUs;
      $api->setEndpoint('exhibitions');
      $api->setArguments(
        $args = array(
            'fields' => '*.*.*.*',
            'filter[exhibition_status][eq]' => $status,
            'meta' => '*',
            'sort' => $sort,
            'limit' => $limit
        )
      );
      return $api->getData();
    }

    public static function listHome(string $status = 'current', string $sort = '-ticketed', int $limit = 100 )
    {
      $api = new DirectUs;
      $api->setEndpoint('exhibitions');
      $api->setArguments(
        $args = array(
            'fields' => '*.*.*.*',
            'filter[exhibition_status][eq]' => $status,
            'meta' => 'result_count,total_count,type',
            'sort' => $sort,
            'limit' => $limit
        )
      );
      return $api->getData();
    }

    public static function archive(string $status = 'current', string $sort = '-ticketed', int $limit = 100 )
    {
      $api = new DirectUs;
      $api->setEndpoint('exhibitions');
      $api->setArguments(
        $args = array(
            'fields' => '*.*.*.*',
            'filter[exhibition_status][eq]' => $status,
            'meta' => 'result_count,total_count,type',
            'sort' => $sort,
            'limit' => $limit
        )
      );
      return $api->getData();
    }

    public static function find(string $slug)
    {
      $api = new DirectUs;
      $api->setEndpoint('exhibitions');
      $api->setArguments(
        $args = array(
            'fields' => '*.*.*.*.*.*',
            'filter[slug][eq]' => $slug,
            'meta' => 'result_count,total_count,type'
        )
      );
      return $api->getData();
    }

    public static function immunity()
    {
      $api = new DirectUs;
      $api->setEndpoint('exhibitions');
      $api->setArguments(
        $args = array(
            'fields' => '*.*.*.*',
            'meta' => '*',
            'filter[immunity_from_seizure][nnull]' => '',
          )
      );
      return $api->getData();
    }

    public static function loanImmunity()
    {
      $api = new DirectUs;
      $api->setEndpoint('incoming_loans');
      $api->setArguments(
        $args = array(
            'fields' => '*.*.*.*',
            'meta' => '*',
            'filter[immunity_from_seizure][nnull]' => '',
          )
      );
      return $api->getData();
    }
}
