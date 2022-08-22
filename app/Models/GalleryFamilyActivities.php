<?php

namespace App\Models;

use App\DirectUs;

class GalleryFamilyActivities extends Model
{
    protected static string $table = 'gallery_family_activities';

    /**
     * @return array
     */
    public static function list(): array
    {
        $api = new DirectUs(
            self::$table,
            array(
                'fields' => '*.*.*.*',
                'meta' => '',
            )
        );
        return $api->getData();
    }
}
