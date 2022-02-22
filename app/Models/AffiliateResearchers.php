<?php

namespace App\Models;

use App\DirectUs;

class AffiliateResearchers extends Model
{
    /**
     * Return a list of affiliate researchers
     * @returns array
     */
    public static function list(): array
    {
      $api = new DirectUs;
      $api->setEndpoint('affiliate_researchers');
      $api->setArguments(
          array(
              'fields' => '*.*.*.*',
              'meta' => 'result_count,total_count,type',
              'sort' => 'last_name'
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
      $api->setEndpoint('affiliate_researchers');
      $api->setArguments(
          array(
              'fields' => '*.*.*.*',
              'meta' => '*',
              'filter[slug][eq]' => $slug
          )
      );
      return $api->getData();
    }
    /**
     * Return a list of affiliate researchers for a department
     * @param int $department The department ID number
     * @returns array
     */
    public static function findByDepartment(int $department): array
    {
      $api = new DirectUs;
      $api->setEndpoint('affiliate_researchers');
      $api->setArguments(
          array(
              'fields' => '*.*.*.*',
              'filter[departments_affiliated.department][in]' => $department,
          )
      );
      return $api->getData();
    }
}
