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
    public static function list(string $section, $exhibition = null): array
    {
        $filters = [
            'fields' => '*',
            'filter[section][eq]' => $section,
            'meta' => '*'
        ];

        if ($exhibition) {
            $filters['filter[exhibition][eq]'] = $exhibition;
        }

        $api = new DirectUs(
            self::$table,
            $filters
        );
        return $api->getData()['data'];
    }


}
