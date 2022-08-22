<?php

namespace App\Models;

use App\DirectUs;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;

class Cases extends Model
{
    protected static string $table = 'mo_labels';

    /**
     * @param int $id
     * @return array
     */
    public static function list(int $id): array
    {
        $api = new DirectUs(
            self::$table,
            array(
                'fields' => '*.*.*.*',
                'meta' => '*',
                'sort' => 'id',
                'filter[related_exhibition.exhibitions_id][eq]' => $id
            )
        );
        return $api->getData();
    }

    /**
     * @param Request $request
     * @return LengthAwarePaginator
     */
    public static function paginator(Request $request): LengthAwarePaginator
    {
        $page = str_replace('case-', '', $request->segment(5));
        $perPage = 1;
        $offset = ($request['page'] - 1) * $perPage;
        $api = new DirectUs(
            self::$table,
            array(
                'fields' => '*.*.*.*',
                'meta' => '*',
                'limit' => $perPage,
                'offset' => $offset,
                'sort' => 'id',
            )
        );
        $cases = $api->getData();
        $total = $cases['meta']['total_count'];
        return new LengthAwarePaginator($cases, $total, $perPage, $page);
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
                'meta' => '*',
                'sort' => 'id',
                'filter[related_exhibition.exhibitions_id.slug][eq]' => $slug
            )
        );
        return $api->getData();
    }
}
