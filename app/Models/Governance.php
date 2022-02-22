<?php

namespace App\Models;

use App\DirectUs;

class Governance extends Model
{
    /**
     * @return array
     */
    public static function getGovernance(): array
    {
      $directus = new DirectUs();
      $directus->setEndpoint('governance_files');
      $directus->setArguments(
          array(
            'fields' => '*.*.*',
            'meta' => '*',
            'sort' => 'title',
            'limit' => 100
          )
      );
      return $directus->getData();
    }

    /**
     * @param string $type
     * @return array
     */
    public static function getGovernanceByType(string $type): array
    {
      $directus = new DirectUs();
      $directus->setEndpoint('governance_files');
      $directus->setArguments(
          array(
            'fields' => '*.*.*',
            'meta' => '*',
            'sort' => '-title',
            'limit' => 30,
            'filter[type]' => $type,
          )
      );
      return $directus->getData();
    }
}
