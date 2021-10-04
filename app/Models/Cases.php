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
  public static function list($id)
  {
    $api = new DirectUs;
    $api->setEndpoint('mo_labels');
    $api->setArguments(
      $args = array(
          'fields' => '*.*.*.*',
          'meta' => '*',
          'sort' => 'id',
          'filter[related_exhibition.exhibitions_id][eq]' => $id
      )
    );
    return $api->getData();
  }

  public static function find($slug)
  {
    $api = new DirectUs;
    $api->setEndpoint('mo_labels');
    $api->setArguments(
      $args = array(
          'fields' => '*.*.*.*',
          'meta' => '*',
          'sort' => 'id',
          'filter[related_exhibition.exhibitions_id.slug][eq]' => $slug
      )
    );
    return $api->getData();
  }
}
