<?php

namespace App\Models;

use App\DirectUs;

class PressTerms extends Model
{
    /**
     * @return array
     */
    public static function list(): array
    {
        $api = new DirectUs;
        $api->setEndpoint('press_terms');
        $api->setArguments(
            array(
                'fields' => '*.*.*.*',
            )
        );
        return $api->getData();
    }
}
