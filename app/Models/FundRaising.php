<?php

namespace App\Models;

use App\DirectUs;

class FundRaising extends Model
{
    /**
     * @var string $table
     */
    protected static string $table = 'fundraising';

    /**
     * @param int $limit
     * @return array
     */
    public static function list(int $limit = 3): array
    {
        $api = new DirectUs(
            self::$table,
            array(
                'fields' => '*.*.*.*',
                'meta' => '*',
                'limit' => $limit
            )
        );
        return $api->getData();
    }
}
