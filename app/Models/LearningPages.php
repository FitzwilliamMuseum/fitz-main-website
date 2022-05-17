<?php

namespace App\Models;

use App\DirectUs;

class LearningPages extends Model
{
    /**
     * @param string $resource
     * @return array
     */
    public static function filterByResource(string $resource): array
    {
        $api = new DirectUs;
        $api->setEndpoint('learning_pages');
        $api->setArguments(
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
        $api = new DirectUs;
        $api->setEndpoint('learning_pages');
        $api->setArguments(
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
        $api = new DirectUs;
        $api->setEndpoint('learning_pages');
        $api->setArguments(
            array(
                'fields' => '*.*.*.*',
                'meta' => 'result_count,total_count,type',
                'filter[slug][eq]' => $slug
            )
        );
        return $api->getData();
    }

}
