<?php

namespace App\Models;

use App\DirectUs;

class LearningPages extends Model
{
    public static function filterByResource(string $resource)
    {
      $api = new DirectUs;
      $api->setEndpoint('learning_pages');
      $api->setArguments(
        $args = array(
          'fields' => '*.*.*.*',
          'meta' => 'result_count,total_count,type',
          'filter[page_type][eq]' => $resource,
          'sort' => '-id'
        )
      );
      return $api->getData();
    }

    public static function filterByResourceNotEqual(string $resource)
    {
      $api = new DirectUs;
      $api->setEndpoint('learning_pages');
      $api->setArguments(
        $args = array(
          'fields' => '*.*.*.*',
          'meta' => 'result_count,total_count,type',
          'filter[page_type][neq]' => $resource,
          'sort' => '-id'
        )
      );
      return $api->getData();
    }

    public static function filterBySlug(string $slug)
    {
      $api = new DirectUs;
      $api->setEndpoint('learning_pages');
      $api->setArguments(
        $args = array(
          'fields' => '*.*.*.*',
          'meta' => 'result_count,total_count,type',
          'filter[slug][eq]' => $slug
        )
      );
      return $api->getData();
    }

}
