<?php

namespace App\Models;

use App\DirectUs;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;


class PressRoom extends Model
{

    /**
     * @param string $sort
     * @param int $limit
     * @return LengthAwarePaginator
     */
    public static function list(Request $request): LengthAwarePaginator
    {
        $perPage = 6;
        $directus = new DirectUs();
        $directus->setEndpoint('pressroom_files');
        $directus->setArguments(
            array(
                'fields' => '*.*.*',
                'limit' => $perPage,
                'offset' => ($request['page'] - 1) * $perPage,
                'meta' => '*',
                'sort' => '-release_date'
            )
        );
        $press = $directus->getData();
        $currentPage = LengthAwarePaginator::resolveCurrentPage();
        $total = $press['meta']['total_count'];
        $paginator = new LengthAwarePaginator($press, $total, $perPage, $currentPage);
        $paginator->setPath(route('press-room'));
        return $paginator;
    }
}
