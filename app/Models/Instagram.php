<?php

namespace App\Models;

use App\DirectUs;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;

class Instagram extends Model
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
        $api->setEndpoint('on_insta');
        $api->setArguments(
            array(
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

    /**
     * @param string $slug
     * @return array
     */
    public static function find(string $slug): array
    {
        $api = new DirectUs;
        $api->setEndpoint('on_insta');
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
