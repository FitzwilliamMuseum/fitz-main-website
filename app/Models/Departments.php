<?php

namespace App\Models;

use App\DirectUs;

class Departments extends Model
{
    protected static string $table = 'departments';

    /**
     * @return array
     */
    public static function list(): array
    {
        $api = new DirectUs(
            self::$table,
            array(
                'fields' => '*.*.*.*',
                'sort' => 'title',
                'meta' => '*'
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
                'filter[slug][eq]' => $slug,
            )
        );
        return $api->getData();
    }
}
