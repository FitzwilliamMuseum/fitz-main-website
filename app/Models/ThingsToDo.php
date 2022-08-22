<?php

namespace App\Models;

use App\DirectUs;

class ThingsToDo extends Model
{
    /**
     * @var string $table The table associated with the model.
     */
    protected static string $table = 'things_to_do';

    /**
     * @return array
     */
    public static function list(): array
    {
        $api = new DirectUs(
            self::$table,
            array(
                'fields' => '*.*.*.*',
                'meta' => '*',
                'sort' => '?',
                'limit' => 3
            )
        );
        return $api->getData();
    }

    /**
     * @return array
     */
    public static function listAll($limit = 100): array
    {
        $api = new DirectUs(
            self::$table,
            array(
                'fields' => '*.*.*.*',
                'meta' => '*',
                'sort' => 'title',
                'limit' => $limit
            )
        );
        return $api->getData();
    }

}
