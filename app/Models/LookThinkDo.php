<?php

namespace App\Models;

use App\DirectUs;

class LookThinkDo extends Model
{
    protected static string $table = 'look_think_do';

    /**
     * @return array
     */
    public static function list(): array
    {
        $api = new DirectUs(
            self::$table,
            array(
                'fields' => '*.*.*.*',
                'filter[publication_date][lte]' => 'now',
                'meta' => 'result_count,total_count,type'
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
                'meta' => 'result_count,total_count,type',
                'filter[publication_date][lte]' => 'now',
                'filter[slug][eq]' => $slug
            )
        );
        return $api->getData();
    }
}
