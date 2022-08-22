<?php

namespace App\Models;

use App\DirectUs;

class Directors extends Model
{
    protected static string $table = 'directors';

    /**
     * @return array
     */
    public static function getDirectors(): array
    {
        $directus = new DirectUs(
            self::$table,
            array(
                'fields' => '*.*.*.*',
                'sort' => 'id',
                'meta' => '*',
            )
        );
        return $directus->getData();
    }

    /**
     * @param string $slug
     * @return array
     */
    public static function getDirector(string $slug): array
    {
        $directus = new DirectUs(
            self::$table,
            array(
                'fields' => '*.*.*',
                'meta' => '*',
                'filter[slug][eq]' => $slug
            )
        );
        return $directus->getData();
    }
}
