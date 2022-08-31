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
     * @param string|null $status
     * @return array
     */
    public static function list(int $limit = 100, string $sort = 'id', string $status = null): array
    {
        $args = array(
            'fields' => '*.*.*.*',
            'meta' => '*',
            'limit' => $limit,
            'sort' => $sort,
        );
        if(!is_null($status)) {
            $args['filter[gallery_status][in]'] = $status;
        }
        $api = new DirectUs(
            self::$table,
            $args
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
