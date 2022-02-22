<?php

namespace App\Models;

use App\DirectUs;

class Galleries extends Model
{
    /**
     * @param int $limit
     * @param string $sort
     * @return array
     */
    public static function list(int $limit = 100, string $sort = 'id'):array
    {
        $api = new DirectUs;
        $api->setEndpoint('galleries');
        $api->setArguments(
            array(
                'fields' => '*.*.*.*',
                'meta' => '*',
                'limit' => $limit,
                'sort' => $sort
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
        $api = new DirectUs;
        $api->setEndpoint('galleries');
        $api->setArguments(
            array(
                'fields' => '*.*.*.*',
                'filter[slug]' => $slug,
                'meta' => '*'
            )
        );
        return $api->getData();
    }
}
