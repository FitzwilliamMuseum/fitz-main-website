<?php

namespace App\Models;

use App\DirectUs;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Collection;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Cache;

class Cases extends Model
{
  public static function list()
  {
    $api = new DirectUs;
    $api->setEndpoint('mo_labels');
    $api->setArguments(
      $args = array(
          'fields' => '*.*.*.*',
          'meta' => '*',
          'sort' => '-title',
      )
    );
    return $api->getData();
  }

  public static function find(string $id)
  {
    $api = new DirectUs;
    $api->setEndpoint('mo_labels');
    $api->setArguments(
      $args = array(
          'fields' => '*.*.*.*',
          'meta' => '*',
          'sort' => 'id',
          'filter[related_exhibition.exhibitions_id][in]' => $id

      )
    );
    return $api->getData();
  }
}
