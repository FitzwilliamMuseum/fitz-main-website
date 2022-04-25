<?php

namespace App\Models;

use App\DirectUs;

class TtnViewpoints extends Model
{
    /**
     * @return array
     */
    public static function list(): array
    {
        $api = new DirectUs;
        $api->setEndpoint('ttn_viewpoints');
        $api->setArguments(
            array(
                'fields' => '*.*.*.*',
                'meta' => '*',
                'sort' => 'id'
            )
        );
        return $api->getData();
    }


    /**
     * @param string $id
     * @return array
     */
    public static function find(string $id): array
    {
        $api = new DirectUs;
        $api->setEndpoint('ttn_viewpoints');
        $api->setArguments(
            array(
                'fields' => '*.*.*.*.*',
                'meta' => '*',
                'filter[id][eq]' => $id
            )
        );
        return $api->getData();
    }

    /**
     * @param int $id
     * @return array
     */
    public static function byArtist(int $id): array
    {
        $api = new DirectUs;
        $api->setEndpoint('ttn_labels');
        $api->setArguments(
            array(
                'fields' => '*.*.*.*.*.*',
                'meta' => '*',
                'filter[artist][eq]' => $id
            )
        );
        return $api->getData();
    }
}
