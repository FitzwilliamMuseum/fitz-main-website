<?php

namespace App\Models;

use App\DirectUs;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Collection;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Cache;

class Highlights extends Model
{
    public static function list(Request $request)
    {
      $perPage = 12;
      $offset = ($request->page -1) * $perPage ;
      $api = new DirectUs;
      $api->setEndpoint('pharos');
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
      $api->setEndpoint('pharos');
      $api->setArguments(
        $args = array(
            'fields' => '*.*.*.*.*',
            'meta' => 'result_count,total_count,type',
            'filter[slug][eq]' => $slug,
        )
      );
      return $api->getData();
    }

    public static function getPeriods()
    {
      $api = new DirectUs;
      $api->setEndpoint('pharos');
      $api->setArguments(
        $args = array(
          'fields' => 'period_assigned,image.*',
          'meta' => 'result_count,total_count,type',
          'limit' => 200
        )
      );
      return $api->getData();
    }

    public static function findByPeriod(string $period)
    {
      if($period == 'italy-1400-1700'){
        $query = 'Italy 1400 - 1700';
      } elseif($period == 'northern-europe-1400-1700') {
        $query = 'Italy 1400 - 1700';
      } else {
        $query = str_replace('-',' ', $period);
      }
      $api = new DirectUs;
      $api->setEndpoint('pharos');
      $api->setArguments(
        $args = array(
            'fields' => '*.*.*.*.*.*',
            'meta' => 'result_count,total_count,type',
            'filter[period_assigned][eq]' =>  $query
        )
      );
      return $api->getData();
    }

    public static function homeList(string $sort = '?', int $limit = 3)
    {
      $api = new DirectUs;
      $api->setEndpoint('pharos');
      $api->setArguments(
        $args = array(
            'fields' => '*.*.*.*',
            'meta' => '*',
            'sort' => $sort,
            'limit' => $limit,
            // 'filter[featured][eq]' => 'yes'
        )
      );
      return $api->getData();
    }
}
