<?php

namespace App\Models;

use App\DirectUs;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;

class OnlineResources extends Model
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
        $api->setEndpoint('online_resources');
        $api->setArguments(
            array(
                'fields' => '*.*.*.*',
                'limit' => $perPage,
                'offset' => $offset,
                'meta' => '*',
                'sort' => 'id'
            )
        );
        $resources =  $api->getData();
        $currentPage = LengthAwarePaginator::resolveCurrentPage();
        $total = $resources['meta']['total_count'];
        $paginator = new LengthAwarePaginator($resources, $total, $perPage, $currentPage);
        $paginator->setPath(route('resources'));
        return $paginator;
    }

    /**
     * @param string $slug
     * @return array
     */
    public static function find(string $slug): array
    {
        $api = new DirectUs;
        $api->setEndpoint('online_resources');
        $api->setArguments(
            array(
                'fields' => '*.*.*.*',
                'meta' => 'result_count,total_count,type',
                'filter[slug][eq]' => $slug
            )
        );
        return $api->getData();
    }
}
