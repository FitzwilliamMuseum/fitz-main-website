<?php

namespace App\Models;

use App\DirectUs;

class PressTerms extends Model
{
    /**
     * @var string $table
     */
    protected static string $table = 'press_terms';
    /**
     * @return array
     */
    public static function list(): array
    {
        $api = new DirectUs(self::$table, array('fields' => '*.*.*.*'));
        return $api->getData();
    }
}
