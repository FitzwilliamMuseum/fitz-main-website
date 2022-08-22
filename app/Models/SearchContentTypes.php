<?php

namespace App\Models;

use App\DirectUs;
class SearchContentTypes extends Model
{
    protected static string $table = 'search_content_types';
    public static function find(string $type)
    {
        $api = new DirectUs(
            self::$table,
            array(
                'fields' => '*.*.*.*',
                'meta' => 'result_count,total_count,type',
                'filter[solr_content_type][eq]' => $type
            )
        );
        $data = $api->getData()['data'];
        if(!empty($data)){
            return collect($api->getData()['data'])->first();
        } else {
            return array('display_name' => 'Unknown');
        }
    }
}
