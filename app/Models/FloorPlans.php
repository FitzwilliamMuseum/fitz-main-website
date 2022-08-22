<?php

namespace App\Models;

use App\DirectUs;

class FloorPlans extends Model
{
    protected static string $table = 'floorplans_guides';

    /**
     * @return array
     */
    public static function list(): array
    {
        $api = new Directus(
            self::$table,
            array(
                'fields' => '*.*.*.*',
                'meta' => 'result_count,total_count,type',
                'sort' => 'id',
                '[filter][type][eq]' => 'floor_plan',
            )
        );
        $floorplans = $api->getData()['data'];
        return array_chunk($floorplans, 4, true);
    }
}
