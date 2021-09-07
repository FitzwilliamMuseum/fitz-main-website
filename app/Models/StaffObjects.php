<?php

namespace App\Models;
use Illuminate\Http\Request;

use Illuminate\Pagination\Paginator;
use Illuminate\Support\Collection;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Cache;

use App\DirectUs;

class StaffObjects extends Model
{
  public static function list(Request $request)
  {
    $perPage = 12;
    $offset = ($request->page -1) * $perPage ;
    $api = new DirectUs;
    $api->setEndpoint('staff_object_of_the_week');
    $api->setArguments(
      $args = array(
          'fields' => '*.*.*.*',
          'meta' => 'result_count,total_count,type',
          'limit' => $perPage,
          'offset' => $offset
      )
    );
    $pharos = $api->getData();
    $currentPage = LengthAwarePaginator::resolveCurrentPage();
    $total = $pharos['meta']['total_count'];
    $paginator = new LengthAwarePaginator($pharos, $total, $perPage, $currentPage);
    $paginator->setPath('highlights');
    return $paginator;
  }

    public static function find(string $slug)
    {
      $api = new DirectUs;
      $api->setEndpoint('staff_object_of_the_week');
      $api->setArguments(
        $args = array(
            'fields' => '*.*.*.*.*',
            'meta' => 'result_count,total_count,type',
            'filter[slug][eq]' => $slug,
        )
      );
      return $api->getData();
    }
}
