<?php

namespace App\Models;

use App\DirectUs;

class TessituraEventTypes extends Model
{
    /**
     * @var string
     */
    protected static string $table = 'tessitura_event_types';

    /**
     * @return array
     */
    public static function listIds(): array
    {
        $api = new DirectUs(
            self::$table,
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
        $api = new DirectUs(
            self::$table,
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
