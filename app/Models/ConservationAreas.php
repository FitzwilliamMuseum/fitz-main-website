<?php

namespace App\Models;

use App\DirectUs;

class ConservationAreas extends Model
{
    /**
     * @var string $table
     */
    protected static string $table = 'conservation_areas';

    /**
     * @return array
     */
    public static function list(): array
    {
        $api = new DirectUs(
            self::$table,
            array(
                'fields' => '*.*.*.*.*',
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
