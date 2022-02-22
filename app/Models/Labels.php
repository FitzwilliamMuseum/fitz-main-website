<?php

namespace App\Models;

use App\DirectUs;

class Labels extends Model
{

    /**
     * @param string $slug
     * @return array
     */
    public static function list(string $slug): array
    {
        $api = new DirectUs;
        $api->setEndpoint('mo_objectlabels');
        $api->setArguments(
            array(
                'fields' => '*.*.*.*.*.*',
                'meta' => '*',
                'sort' => '-title',
                'filter[object_labels.mo_labels_id.slug][eq]' => $slug
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
        $api->setEndpoint('mo_objectlabels');
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
