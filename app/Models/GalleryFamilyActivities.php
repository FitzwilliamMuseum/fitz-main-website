<?php

namespace App\Models;

use App\DirectUs;

class GalleryFamilyActivities extends Model
{
    /**
     * @return array
     */
    public static function list(): array
    {
        $api = new DirectUs;
        $api->setEndpoint('gallery_family_activities');
        $api->setArguments(
            array(
                'fields' => '*.*.*.*',
                'meta' => '',
            )
        );
        return $api->getData();
    }
}
