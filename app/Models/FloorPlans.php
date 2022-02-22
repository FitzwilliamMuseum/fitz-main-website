<?php

namespace App\Models;

use App\DirectUs;

class FloorPlans extends Model
{
    /**
     * @return array
     */
    public static function list(): array
    {
        $api = new Directus;
        $api->setEndpoint('floorplans_guides');
        $api->setArguments(
            array(
                'fields' => '*.*.*.*',
                'meta' => 'result_count,total_count,type',
                'sort' => 'id',
                '[filter][type][eq]' => 'floor_plan',
            )
        );
        return $api->getData();
    }
}
