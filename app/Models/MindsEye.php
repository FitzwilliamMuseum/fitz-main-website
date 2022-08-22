<?php

namespace App\Models;

use Illuminate\Http\Request;
use App\DirectUs;

class MindsEye extends Model
{
    /**
     * @var string $table
     */
    protected static string $table = 'mindseye';

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
                array('marlay-group', 'staff'))) {
            $args['filter[publish_time][gte]'] = '2020-10-23';
        } else {
            $args['filter[publish_time][lte]'] = 'now';
        }
        $api = new DirectUs(
            self::$table,
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
            self::$table,
            array(
                'fields' => '*.*.*.*',
                'meta' => 'result_count,total_count,type',
                'filter[slug][eq]' => $slug
            )
        );
        return $api->getData();
    }
}
