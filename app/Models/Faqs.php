<?php

namespace App\Models;

use App\DirectUs;

class Faqs extends Model
{

    /**
     * @var string $table
     */
    protected static string $table = 'faqs';

    /**
     * @param string $section
     * @return array
     */
    public static function list(string $section): array
    {
        $api = new DirectUs(
            self::$table,
            array(
                'fields' => '*',
                'filter[section][eq]' => $section,
                'meta' => '*'
            )
        );
        return $api->getData()['data'];
    }


}
