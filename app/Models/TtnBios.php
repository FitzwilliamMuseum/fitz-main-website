<?php

namespace App\Models;

use App\DirectUs;

class TtnBios extends Model
{

    /**
     * @return array
     */
    public static function list(): array
    {
        $api = new DirectUs;
        $api->setEndpoint('ttn_artists');
        $api->setArguments(
            array(
                'fields' => '*.*.*.*.*.*',
                'meta' => '*',
                'sort' => 'year_of_birth',
            )
        );
        return $api->getData();
    }

    /**
     * @param string $field
     * @return array
     */
    public static function listFiltered(string $field): array
    {
        $filter = 'filter[' . $field . '][nnull]';
        $api = new DirectUs;
        $api->setEndpoint('ttn_artists');
        $api->setArguments(
            array(
                'fields' => '*.*.*.*.*.*',
                'meta' => '*',
                'sort' => 'year_of_birth',
                $filter => '',
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
        $api->setEndpoint('ttn_artists');
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
