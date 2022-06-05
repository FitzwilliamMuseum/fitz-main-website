<?php

namespace App\Models;

use App\DirectUs;
class SearchContentTypes extends Model
{

    public static function find(string $type)
    {
        $api = new DirectUs;
        $api->setEndpoint('search_content_types');
        $api->setArguments(
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
