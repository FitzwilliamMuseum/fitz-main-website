<?php

namespace App\Models;

use App\DirectUs;

class Exhibitions extends Model
{
    /**
     * @param string $status
     * @param string $sort
     * @param string $type
     * @param int $limit
     * @return array
     */
    public static function list(string $status = 'current', string $sort = '-ticketed', string $type = 'exhibition', int $limit = 100 ):array
    {
      $api = new DirectUs;
      $api->setEndpoint('exhibitions');
      $api->setArguments(
          array(
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

    /**
     * @param string $status
     * @param string $sort
     * @param int $limit
     * @return array
     */
    public static function listFuture(string $status = 'future', string $sort = '-ticketed', int $limit = 100 ):array
    {
      $api = new DirectUs;
      $api->setEndpoint('exhibitions');
      $api->setArguments(
          array(
              'fields' => '*.*.*.*',
              'filter[exhibition_status][eq]' => $status,
              'meta' => '*',
              'sort' => $sort,
              'limit' => $limit
          )
      );
      return $api->getData();
    }

    /**
     * @param string $status
     * @param string $sort
     * @param int $limit
     * @return array
     */
    public static function listHome(string $status = 'current', string $sort = '-ticketed', int $limit = 100 ):array
    {
      $api = new DirectUs;
      $api->setEndpoint('exhibitions');
      $api->setArguments(
          array(
              'fields' => '*.*.*.*',
              'filter[exhibition_status][eq]' => $status,
              'meta' => 'result_count,total_count,type',
              'sort' => $sort,
              'limit' => $limit
          )
      );
      return $api->getData();
    }

    /**
     * @param string $status
     * @param string $sort
     * @param int $limit
     * @return array
     */
    public static function archive(string $status = 'current', string $sort = '-ticketed', int $limit = 100 ):array
    {
      $api = new DirectUs;
      $api->setEndpoint('exhibitions');
      $api->setArguments(
          array(
              'fields' => '*.*.*.*',
              'filter[exhibition_status][eq]' => $status,
              'meta' => 'result_count,total_count,type',
              'sort' => $sort,
              'limit' => $limit
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
      $api = new DirectUs;
      $api->setEndpoint('exhibitions');
      $api->setArguments(
          array(
              'fields' => '*.*.*.*.*.*',
              'filter[slug][eq]' => $slug,
              'meta' => '*'
          )
      );
      return $api->getData();
    }

    /**
     * @return array
     */
    public static function immunity(): array
    {
      $api = new DirectUs;
      $api->setEndpoint('exhibitions');
      $api->setArguments(
          array(
              'fields' => '*.*.*.*',
              'meta' => '*',
              'filter[immunity_from_seizure][nnull]' => '',
              'sort' => '-exhibition_end_date'
            )
      );
      return $api->getData();
    }

    /**
     * @return array
     */
    public static function loanImmunity(): array
    {
      $api = new DirectUs;
      $api->setEndpoint('incoming_loans');
      $api->setArguments(
          array(
              'fields' => '*.*.*.*',
              'meta' => '*',
              'filter[immunity_from_seizure][nnull]' => '',
              'sort' => '-id'
            )
      );
      return $api->getData();
    }

    /**
     * @param int $slug
     * @return array
     */
    public static function findByExternals(int $curator): array
    {
        $api = new DirectUs;
        $api->setEndpoint('exhibitions_associated_people');
        $api->setArguments(
            array(
                'fields' => '*.*.*.*',
                'filter[associated_people_id][in]' => $curator,
            )
        );
        return $api->getData();
    }
}
