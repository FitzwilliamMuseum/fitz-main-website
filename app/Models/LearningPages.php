<?php

namespace App\Models;

use App\DirectUs;

class LearningPages extends Model
{
    /**
     * @var string $table
     */
    protected static string $table = 'learning_pages';

    /**
     * @param string $resource
     * @return array
     */
    public static function filterByResource(string $resource): array
    {
        $api = new DirectUs(
            self::$table,
            array(
                'fields' => '*.*.*.*',
                'meta' => 'result_count,total_count,type',
                'filter[page_type][eq]' => $resource,
                'sort' => '-id'
            )
        );
        return $api->getData();
    }

    /**
     * @param string $resource
     * @return array
     */
    public static function filterByResourceNotEqual(string $resource): array
    {
        $api = new DirectUs(
            self::$table,
            array(
                'fields' => '*.*.*.*',
                'meta' => 'result_count,total_count,type',
                'filter[page_type][neq]' => $resource,
                'sort' => '-id'
            )
        );
        return $api->getData();
    }

    /**
     * @param string $slug
     * @return array
     */
    public static function filterBySlug(string $slug): array
    {
        $api = new DirectUs(
            self::$table,
            array(
                'fields' => '*.*.*.*',
                'meta' => 'result_count,total_count,type',
                'filter[slug][eq]' => $slug
            )
        );
        return $api->getData();
    }

}
