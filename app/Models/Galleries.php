<?php

namespace App\Models;

use App\DirectUs;

class Galleries extends Model
{
    /**
     * @var string $table
     */
    protected static string $table = 'galleries';

    /**
     * @param int $limit
     * @param string $sort
     * @return array
     */
    public static function list(int $limit = 100, string $sort = 'id'): array
    {
        $api = new DirectUs(
            self::$table,
            array(
                'fields' => '*.*.*.*',
                'meta' => '*',
                'limit' => $limit,
                'sort' => $sort
            )
        );
        return $api->getData();
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
                'filter[slug]' => $slug,
                'meta' => '*'
            )
        );
        return $api->getData();
    }
}
