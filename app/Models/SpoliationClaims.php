<?php

namespace App\Models;

use App\DirectUs;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;

class SpoliationClaims extends Model
{
    public static string $table = 'spoliation_claims';

    public static function find(string $priref): array
    {
        $api = new DirectUs();
        $api->setEndpoint(self::$table);
        $api->setArguments(
            array(
                'fields' => '*.*.*',
                'filter[priref][eq]' => $priref
            )
        );
        return $api->getData()['data'];
    }

    /**
     * @param Request $request
     * @return LengthAwarePaginator
     */
    public static function list(Request $request): LengthAwarePaginator
    {
        $perPage = 12;
        $offset = ($request['page'] -1) * $perPage ;
        $api = new DirectUs;
        $api->setEndpoint(self::$table);
        $api->setArguments(
            array(
                'fields' => '*.*.*.*',
                'meta' => '*',
                'sort' => '-id',
                'limit' => $perPage,
                'offset' => $offset
            )
        );
        $news = $api->getData();
        $currentPage = LengthAwarePaginator::resolveCurrentPage();
        $total = $news['meta']['total_count'];
        $paginator = new LengthAwarePaginator($news, $total, $perPage, $currentPage);
        $paginator->setPath('news');
        return $paginator;
    }
}
