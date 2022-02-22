<?php

namespace App\Models;

use App\DirectUs;

class TessituraFacilities extends Model
{
    /**
     * @return array
     */
    public static function listIds(): array
    {
        $api = new DirectUs;
        $api->setEndpoint('tessitura_facilities');
        $api->setArguments(
            array(
                'fields' => 'facility_id',
                'meta' => '*'
            )
        );
        return $api->getData()['data'];
    }
}
