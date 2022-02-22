<?php

namespace App\Models;

use App\DirectUs;

class TessituraEventTypes extends Model
{
    /**
     * @return array
     */
    public static function listIds(): array
    {
        $api = new DirectUs;
        $api->setEndpoint('tessitura_event_types');
        $api->setArguments(
            array(
                'fields' => 'event_id',
                'meta' => '*'
            )
        );
        return $api->getData()['data'];
    }
}
