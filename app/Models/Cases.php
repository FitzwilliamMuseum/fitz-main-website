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

  public static function paginator(Request $request)
  {
    $page = str_replace('case-', '',$request->segment(5));
    $perPage = 1;
    $offset = ($request->page -1) * $perPage ;
    $api = new DirectUs;
    $api->setEndpoint('mo_labels');
    $api->setArguments(
      $args = array(
          'fields' => '*.*.*.*',
          'meta' => '*',
          'limit' => $perPage,
          'offset' => $offset,
          'sort' => 'id',
      )
    );
    $cases = $api->getData();
    $total = $cases['meta']['total_count'];
    $paginator = new LengthAwarePaginator($cases, $total, $perPage, $page);
    return $paginator;
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
