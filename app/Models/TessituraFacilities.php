<?php

namespace App\Models;

use App\DirectUs;

class TessituraFacilities extends Model
{
    protected static string $table = 'tessitura_facilities';

    /**
     * @return array
     */
    public static function listIds(): array
    {
        $api = new DirectUs(
            self::$table,
            array(
                'fields' => 'facility_id',
                'meta' => '*'
            )
        );
        return $api->getData()['data'];
    }
}
