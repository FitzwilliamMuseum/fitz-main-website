<?php

namespace App\Models;

use App\DirectUs;

class Collections extends Model
{
    /**
     * @var string $table
     */
    protected static string $table = 'collections';

    /**
     * @return array
     */
    public static function list(): array
    {
        $api = new DirectUs(
            self::$table,
            array(
                'fields' => '*.*.*',
                'sort' => 'collection_name'
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
                'fields' => '*.*.*.*.*',
                'filter[slug]=' => $slug
            )
        );
        return $api->getData();
    }
}
