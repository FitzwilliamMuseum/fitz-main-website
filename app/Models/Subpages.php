<?php

namespace App\Models;

use App\DirectUs;


class Subpages extends Model
{
    /**
     * @var string
     */
    protected static string $table = 'subpages';

    /**
     * @return array
     */
    public static function getSubpage(string $slug): array
    {
        $api = new DirectUs(
            self::$table,
            array(
                'fields' => '*.*.*.*',
                'filter[slug][eq]' => $slug,
                'meta' => '*',
            )
        );
        return $api->getData();
    }
}
