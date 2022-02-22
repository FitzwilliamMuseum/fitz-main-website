<?php

namespace App\Models;

use App\DirectUs;

class ResearchProjects extends Model
{
    /**
     * @param string $sort
     * @param int $limit
     * @return array
     */
    public static function list(string $sort = 'title', int $limit = 100): array
    {
        $api = new DirectUs;
        $api->setEndpoint('research_projects');
        $api->setArguments(
            array(
                'fields' => '*.*.*.*',
                'meta' => 'result_count,total_count,type',
                'sort' => $sort,
                'limit' => $limit
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
        $api = new DirectUs;
        $api->setEndpoint('research_projects');
        $api->setArguments(
            array(
                'fields' => '*.*.*.*',
                'meta' => 'result_count,total_count,type',
                'filter[slug][eq]' => $slug
            )
        );
        return $api->getData();
    }

    /**
     * @return array
     */
    public static function findByDepartment(): array
    {
        $api = new DirectUs;
        $api->setEndpoint('research_projects');
        $api->setArguments(
            array(
                'fields' => '*.*.*.*',
                'meta' => 'result_count,total_count,type',
                'filter[departments_involved][contains]' => 'Learning'
            )
        );
        return $api->getData();
    }
}
