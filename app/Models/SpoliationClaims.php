<?php

namespace App\Models;

use App\DirectUs;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;

class SpoliationClaims extends Model
{
    /**
     * @var string
     */
    public static string $table = 'spoliation_claims';

    /**
     * @param string $priref
     * @return array
     */
    public static function find(string $priref): array
    {
        $api = new DirectUs(
            self::$table,
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
        $offset = ($request['page'] - 1) * $perPage;
        $api = new DirectUs(
            self::$table,
            array(
                'fields' => '*.*.*.*',
                'meta' => '*',
                'sort' => '-id',
                'limit' => $perPage,
                'offset' => $offset
            )
        );
        $claims = $api->getData();
        $paginator = new LengthAwarePaginator(
            $claims,
            $claims['meta']['total_count'],
            $perPage, LengthAwarePaginator::resolveCurrentPage()
        );
        $paginator->setPath(route('about.spoliation'));
        return $paginator;
    }
}
