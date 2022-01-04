<?php

namespace App\Models;

use App\DirectUs;

class Governance extends Model
{
    public static function getGovernance(){
      $directus = new DirectUs();
      $directus->setEndpoint('governance_files');
      $directus->setArguments(
        $args = array(
          'fields' => '*.*.*',
          'meta' => '*',
          'sort' => 'title',
          'limit' => 100
        )
      );
      return $directus->getData();
    }

    public static function getGovernanceByType(string $type){
      $directus = new DirectUs();
      $directus->setEndpoint('governance_files');
      $directus->setArguments(
        $args = array(
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
