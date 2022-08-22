<?php

namespace App\Models;

use App\DirectUs;

class Carousels extends Model
{
    protected static string $table = 'carousels';

    /**
     * @param string $section
     * @return array
     */
    public static function findBySection(string $section): array
    {
        $api = new DirectUs(
            self::$table,
            array(
                'fields' => '*.*.*.*',
                'meta' => 'result_count,total_count,type',
                'filter[section][eq]' => $section,
                'single' => '1',
                'sort' => '-id'
            )
        );
        return $api->getData();
    }
}
