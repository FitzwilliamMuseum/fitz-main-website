<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\DirectUs;

class Themes extends Model
{
    public static function list()
    {
      $api = new DirectUs();
      $api->setEndpoint('themes');
      $api->setArguments(
        $args = array(
            'fields' => '*.*.*.*',
            'meta' => '*',
        )
      );
      return $api->getData();
    }

    public static function details(string $slug)
    {
      $api = new DirectUs();
      $api->setEndpoint('themes');
      $api->setArguments(
        $args = array(
            'fields' => '*.*.*.*',
            'meta' => 'result_count,total_count,type',
            'filter[slug][eq]' => $slug
        )
      );
      return $api->getData();
    }
}
