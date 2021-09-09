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
}
