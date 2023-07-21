<?php

namespace App\Models;

use App\DirectUs;

class AnnouncementGlobal extends Model
{
    protected static string $table = 'announcement_global';

    /**
     * Return the announcement
     *
     * @returns array
     */
    public static function list(): array
    {
        $api = new DirectUs(
            self::$table,
            array(
                'fields' => '*.*.*.*',
                'filter[status]' => 'published',
                'meta' => '*',
                'sort' => 'id'
            )
        );

        return $api->getData();
    }
}
