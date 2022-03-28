<?php

namespace App\Models;

use App\DirectUs;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;

class ExternalCurators extends Model
{


    /**
     * @param string $slug
     * @return array
     */
    public static function find(string $slug): array
    {
        $api = new DirectUs;
        $api->setEndpoint('associated_people');
        $api->setArguments(
            array(
                'fields' => '*.*.*.*.*',
                'meta' => '*',
                'filter[slug][eq]' => $slug,
            )
        );
        return $api->getData();
    }

    public static function list(Request $request): LengthAwarePaginator
    {
        $perPage = 12;
        $offset = ($request['page'] - 1) * $perPage;
        $api = new DirectUs;
        $api->setEndpoint('associated_people');
        $api->setArguments(
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
        $currentPage = LengthAwarePaginator::resolveCurrentPage();
        $total = $curators['meta']['total_count'];
        $paginator = new LengthAwarePaginator($curators, $total, $perPage, $currentPage);
        return $paginator->setPath('news');
    }
}
