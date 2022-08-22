<?php

namespace App\Models;

use App\DirectUs;

class CoronaVirusNotes extends Model
{
    /**
     * @var string $table
     */
    protected static string $table = 'corona_virus_notes';

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
