<?php

namespace App\Models;

use App\DirectUs;

class HighlightPeriods extends Model
{
    /**
     * @var string $table
     */
    protected static string $table = 'pharos_periods';

    /**
     * @param string $period
     * @return array
     */
    public static function find(string $period): array
    {
        $api = new DirectUs(
            self::$table,
            array(
                'fields' => '*.*.*.*.*.*',
                'meta' => 'result_count,total_count,type',
                'filter[slug][like]' => $period
            )
        );
        return $api->getData();
    }
}
