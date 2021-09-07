<?php

namespace App\Models;

use App\DirectUs;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Collection;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Cache;

class Instagram extends Model
{
    public static function list(Request $request)
    {
      $perPage = 12;
      $offset = ($request->page -1) * $perPage ;
      $api = new DirectUs;
      $api->setEndpoint('on_insta');
      $api->setArguments(
        $args = array(
          'fields' => '*.*.*.*',
          'meta' => 'result_count,total_count,type',
          'sort' => '-date_posted',
          'limit' => $perPage,
          'offset' => $offset
        )
      );
      $insta = $api->getData();
      $currentPage = LengthAwarePaginator::resolveCurrentPage();
      $total = $insta['meta']['total_count'];
      $paginator = new LengthAwarePaginator($insta, $total, $perPage, $currentPage);
      $paginator->setPath('instagram');
      return $paginator;
    }

    public static function find(string  $slug)
    {
      $api = new DirectUs;
      $api->setEndpoint('on_insta');
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
