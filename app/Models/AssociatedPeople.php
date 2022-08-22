<?php

namespace App\Models;

use App\DirectUs;

class AssociatedPeople extends Model
{
    protected static string $table = 'associated_people';
    /**
     * @param string $filters
     * @return array
     */
    public static function list(string $filters = 'podcastGuest'): array
    {
        $api = new DirectUs(
            self::$table,
            array(
                'fields' => '*.*.*.*',
                'sort' => 'surname',
                'filter[association][in]' => $filters
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
                'meta' => '*',
                'filter[slug][eq]' => $slug,
            )
        );
        return $api->getData();
    }
}
