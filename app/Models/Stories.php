<?php

namespace App\Models;

use App\DirectUs;

class Stories extends Model
{
    /**
     * @var string
     */
    protected static string $table = 'stories';

    /**
     * Explicit field list – deep enough to reach image group / carousel files
     * without pulling in every relation with *.*.*.*.*
     *
     * @var string
     */
    protected static string $fields = '*,hero_image.*,'
        . 'sections.*,'
        . 'sections.components.*,'
        . 'sections.components.*.*,';

    /**
     * @param int $limit
     * @return array
     */
    public static function list(int $limit = 100): array
    {
        $api = new DirectUs(
            self::$table,
            array(
                'fields' => '*,hero_image.*',
                'filter[status][eq]' => 'published',
                'meta' => 'result_count,total_count,type',
                'sort' => '-id',
                'limit' => $limit
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
                'fields' => self::$fields,
                'filter[slug][eq]' => $slug,
                'filter[status][eq]' => 'published',
                'meta' => '*'
            )
        );
        return $api->getData();
    }
}