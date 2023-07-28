<?php

namespace App\Models;

use App\DirectUs;

class GroupVisits extends Model
{
    protected static string $table = 'group_visits';

    /**
     * @return array
     */
    public static function list(): array
    {
        $api = new DirectUs(
            self::$table,
            array(
                'fields' => '*.*.*.*',
                'meta' => 'result_count,total_count,type',
                'sort' => 'id'
            )
        );
        return $api->getData();
    }
}
