<?php

namespace App\Models;
use App\DirectUs;

class ResearchProjects extends Model
{
    public static function list(string $sort = 'title', int $limit = 100)
    {
      $api = new DirectUs;
      $api->setEndpoint('research_projects');
      $api->setArguments(
        $args = array(
            'fields' => '*.*.*.*',
            'meta' => 'result_count,total_count,type',
            'sort' => $sort,
            'limit' => $limit
        )
      );
      return $api->getData();
    }

    public static function find(string $slug)
    {
      $api = new DirectUs;
      $api->setEndpoint('research_projects');
      $api->setArguments(
        $args = array(
            'fields' => '*.*.*.*',
            'meta' => 'result_count,total_count,type',
            'filter[slug][eq]' => $slug
        )
      );
      return $api->getData();
    }

    public static function findByDepartment(string $department)
    {
      $api = new DirectUs;
      $api->setEndpoint('research_projects');
      $api->setArguments(
        $args = array(
          'fields' => '*.*.*.*',
          'meta' => 'result_count,total_count,type',
          'filter[departments_involved][contains]' => 'Learning'
        )
      );
      return $api->getData();
    }
}
