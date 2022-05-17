<?php

namespace App\Models;

use App\DirectUs;

class ResearchOpportunities extends Model
{

    /**
     * @return array
     */
    public static function list(): array
    {
        $api = new DirectUs();
        $api->setEndpoint('research_opportunities');
        $api->setArguments(
            array(
                'fields' => '*.*.*.*',
                'meta' => 'result_count,total_count,type',
                'sort' => 'id'
            )
        );
        return $api->getData();
    }

    /**
     * @param string $slug
     * @return array
     */
    public static function find(string $slug): array
    {
        $api = new DirectUs();
        $api->setEndpoint('research_opportunities');
        $api->setArguments(
            array(
                'fields' => '*.*.*.*',
                'meta' => 'result_count,total_count,type',
                'filter[slug][eq]' => $slug
            )
        );
        return $api->getData();
    }
}
