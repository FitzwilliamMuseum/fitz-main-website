<?php

namespace App\Models;

use App\DirectUs;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;

class ExternalCurators extends Model
{

    protected static string $table = 'associated_people';

    /**
     * @param string $slug
     * @return array
     */
    public static function find(string $slug): array
    {
        $api = new DirectUs(
            self::$table,
            array(
                'fields' => '*.*.*.*.*',
                'meta' => '*',
                'filter[slug][eq]' => $slug,
            )
        );
        return $api->getData();
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
                'fields' => '*.*.*.*.*',
                'sort' => '-id',
                'filter[association][in]' => 'exhibitionCurator',
                'limit' => $perPage,
                'offset' => $offset,
                'meta' => 'result_count,total_count,type',

            )
        );
        $curators = $api->getData();
        $paginator = new LengthAwarePaginator(
            $curators,
            $curators['meta']['total_count'],
            $perPage,
            LengthAwarePaginator::resolveCurrentPage()
        );
        return $paginator->setPath('news');
    }
}
