<?php

namespace App\Models;

use App\DirectUs;

class HomePage extends Model
{
    /**
     * @var string $table
     */
    protected static string $table = 'home_page_config';

    /**
     * @return array
     */
    public static function find(): array
    {
        $api = new DirectUs(
            self::$table,
            array(
                'fields' => '*.*.*.*.*',
                'meta' => '*',
                'sort' => '-id'
            )
        );
        return $api->getData()['data'][0];
    }
}
