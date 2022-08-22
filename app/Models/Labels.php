<?php

namespace App\Models;

use App\DirectUs;

class Labels extends Model
{
    /**
     * @var string $table
     */
    protected static string $table = 'mo_objectlabels';

    /**
     * @param string $slug
     * @return array
     */
    public static function list(string $slug): array
    {
        $api = new DirectUs(
            self::$table,
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
        $api = new DirectUs(
            self::$table,
            array(
                'fields' => '*.*.*.*.*.*',
                'meta' => '*',
                'filter[slug][eq]' => $slug
            )
        );
        return $api->getData();
    }
}
