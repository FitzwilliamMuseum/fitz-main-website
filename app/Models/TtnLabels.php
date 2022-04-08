<?php

namespace App\Models;

use App\DirectUs;

class TtnLabels extends Model
{
    /**
     * @return array
     */
    public static function list(): array
    {
        $api = new DirectUs;
        $api->setEndpoint('ttn_labels');
        $api->setArguments(
            array(
                'fields' => '*.*.*.*.*.*',
                'meta' => '*',
                'sort' => 'display_id_number',
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
        $api->setEndpoint('ttn_labels');
        $api->setArguments(
            array(
                'fields' => '*.*.*.*.*.*',
                'meta' => '*',
                'filter[slug][eq]' => $slug
            )
        );
        return $api->getData();
    }
}
