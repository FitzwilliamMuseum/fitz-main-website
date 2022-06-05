<?php

namespace App\Models;

use App\DirectUs;
class SearchContentTypes extends Model
{

    public static function find(string $type): Array| NULL
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
        dd($api->getData()['data']);
        return collect($api->getData()['data'])->first();
    }
}
