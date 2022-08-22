<?php

namespace App\Models;

use App\DirectUs;

class Transport extends Model
{
    /**
     * @var string $table The table associated with the model.
     */
    protected static string $table = 'transport';

    /**
     * @return array
     */
    public static function list(): array
    {
        $api = new Directus(
            self::$table,
            array(
                'fields' => '*.*.*.*',
                'meta' => '*',
                'sort' => 'id',
            )
        );
        return $api->getData();
    }
}
