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

    /**
     * @return array
     */
    public static function eventTypeMatch(): array
    {
        $api = new DirectUs;
        $api->setEndpoint('tessitura_event_types');
        $api->setArguments(
            array(
                'fields' => 'slug,event_id',
                'meta' => '*'
            )
        );
        $events = $api->getData()['data'];
        $cleaned = array();
        foreach ($events as $v) {
            $cleaned[$v['slug']] = $v['event_id'];
        }
        $cleaned['default'] = 37;
        return $cleaned;
    }

}
