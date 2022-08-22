<?php

namespace App\Models;

use App\DirectUs;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;

class OnlineResources extends Model
{
    /**
     * @var string $table
     */
    protected static string $table = 'online_resources';

    /**
     * @param Request $request
     * @return LengthAwarePaginator
     */
    public static function list(Request $request): LengthAwarePaginator
    {
        $perPage = 12;
        $offset = ($request['page'] - 1) * $perPage;
        $api = new DirectUs(
            self::$table,
            array(
                'fields' => '*.*.*.*',
                'limit' => $perPage,
                'offset' => $offset,
                'meta' => '*',
                'sort' => 'id'
            )
        );
        $resources = $api->getData();
        $paginator = new LengthAwarePaginator(
            $resources,
            $resources['meta']['total_count'],
            $perPage,
            LengthAwarePaginator::resolveCurrentPage()
        );
        $paginator->setPath(route('resources'));
        return $paginator;
    }

    /**
     * @param string $slug
     * @return array
     */
    public static function find(string $slug): array
    {
        $api = new DirectUs(
            self::$table,
            array(
                'fields' => '*.*.*.*',
                'meta' => 'result_count,total_count,type',
                'filter[slug][eq]' => $slug
            )
        );
        return $api->getData();
    }
}
