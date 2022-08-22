<?php

namespace App\Models;

use App\DirectUs;
use Illuminate\Http\Request;

class Podcasting extends Model
{
    /**
     * @param Request $request
     * @return array
     */
    public static function list(Request $request): array
    {
        $args = array(
            'fields' => '*.*.*.*',
            'meta' => 'result_count,total_count,type',
            'sort' => 'publish_time'
        );
        if ($request->has('access') && in_array($request['access'],
                array('preview', 'staff'))) {
            $args['filter[publish_time][gte]'] = '2020-10-23';
        } else {
            $args['filter[publish_time][lte]'] = 'now';
        }
        $api = new DirectUs(
            'mindseye',
            $args
        );

        return $api->getData();
    }

    /**
     * @param string $slug
     * @return array
     */
    public static function find(string $slug): array
    {
        $api = new DirectUs(
            'podcasting',
            array(
                'fields' => '*.*.*.*.*',
                'meta' => '*',
                'filter[slug][eq]' => $slug,
            )
        );
        return $api->getData();
    }
}
