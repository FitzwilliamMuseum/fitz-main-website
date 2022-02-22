<?php

namespace App\Models;

use App\DirectUs;

class AssociatedPeople extends Model
{
    /**
     * @return array
     */
    public static function list(): array
    {
        $api = new DirectUs;
        $api->setEndpoint('associated_people');
        $api->setArguments(
            array(
                'fields' => '*.*.*.*',
                'sort' => 'surname'
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
        $api->setEndpoint('associated_people');
        $api->setArguments(
            array(
                'fields' => '*.*.*.*.*',
                'meta' => '*',
                'filter[slug][eq]' => $slug,
            )
        );
        return $api->getData();
    }
}
