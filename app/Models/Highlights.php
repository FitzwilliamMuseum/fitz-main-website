<?php

namespace App\Models;

use App\DirectUs;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;

class Highlights extends Model
{
    /**
     * @param Request $request
     * @return LengthAwarePaginator
     */
    public static function list(Request $request): LengthAwarePaginator
    {
        $perPage = 12;
        $offset = ($request['page'] - 1) * $perPage;
        $api = new DirectUs;
        $api->setEndpoint('pharos');
        $api->setArguments(
            array(
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

    /**
     * @param string $slug
     * @return array
     */
    public static function find(string $slug): array
    {
        $api = new DirectUs;
        $api->setEndpoint('pharos');
        $api->setArguments(
            array(
                'fields' => '*.*.*.*.*',
                'meta' => 'result_count,total_count,type',
                'filter[slug][eq]' => $slug,
            )
        );
        return $api->getData();
    }

    /**
     * @return array
     */
    public static function getPeriods(): array
    {
        $api = new DirectUs;
        $api->setEndpoint('pharos');
        $api->setArguments(
            array(
                'fields' => 'period_assigned,image.*',
                'meta' => 'result_count,total_count,type',
                'limit' => 200
            )
        );
        return $api->getData();
    }

    /**
     * @param string $period
     * @return array
     */
    public static function findByPeriod(string $period): array
    {
        if ($period == 'italy-1400-1700') {
            $query = 'Italy 1400 - 1700';
        } elseif ($period == 'northern-europe-1400-1700') {
            $query = 'Italy 1400 - 1700';
        } else {
            $query = str_replace('-', ' ', $period);
        }
        $api = new DirectUs;
        $api->setEndpoint('pharos');
        $api->setArguments(
            array(
                'fields' => '*.*.*.*.*.*',
                'meta' => 'result_count,total_count,type',
                'filter[period_assigned][eq]' => $query
            )
        );
        return $api->getData();
    }

    /**
     * @param string $sort
     * @param int $limit
     * @return array
     */
    public static function homeList(string $sort = '?', int $limit = 3): array
    {
        $api = new DirectUs;
        $api->setEndpoint('pharos');
        $api->setArguments(
            array(
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
