<?php

namespace App\Models;

use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use App\DirectUs;

class StaffObjects extends Model
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
        $api->setEndpoint('staff_object_of_the_week');
        $api->setArguments(
            array(
                'fields' => '*.*.*.*',
                'meta' => '*',
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
        $api->setEndpoint('staff_object_of_the_week');
        $api->setArguments(
            array(
                'fields' => '*.*.*.*.*',
                'meta' => '*',
                'filter[slug][eq]' => $slug,
            )
        );
        return $api->getData();
    }
}
