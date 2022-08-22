<?php

namespace App\Models;

use App\DirectUs;

class VisitUsComponents extends Model
{
    protected static string $table = 'visit_us_components';
    /**
     * @param int $id
     * @return array
     */
    public static function find(int $id): array
    {
        $api = new Directus(
            self::$table,
            array(
                'fields' => '*.*.*.*',
                'meta' => '*',
                'sort' => 'id',
                'filter[id][eq]' => $id
            )
        );
        return $api->getData();
    }
}
