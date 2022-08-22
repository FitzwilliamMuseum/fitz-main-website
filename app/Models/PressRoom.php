<?php

namespace App\Models;

use App\DirectUs;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;


class PressRoom extends Model
{
    /**
     * @var string $table
     */
    protected static string $table = 'pressroom_files';

    /**
     * @param string $sort
     * @param int $limit
     * @return LengthAwarePaginator
     */
    public static function list(Request $request): LengthAwarePaginator
    {
        $perPage = 6;
        $directus = new DirectUs(
            self::$table,
            array(
                'fields' => '*.*.*',
                'limit' => $perPage,
                'offset' => ($request['page'] - 1) * $perPage,
                'meta' => '*',
                'sort' => '-release_date'
            )
        );
        $press = $directus->getData();
        $paginator = new LengthAwarePaginator(
            $press,
            $press['meta']['total_count'],
            $perPage,
            LengthAwarePaginator::resolveCurrentPage()
        );
        $paginator->setPath(route('press-room'));
        return $paginator;
    }
}
