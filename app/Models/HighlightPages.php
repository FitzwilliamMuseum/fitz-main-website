<?php

namespace App\Models;

use App\DirectUs;

class HighlightPages extends Model
{
    public static function list(string $slug, string $section)
    {
      $api = new DirectUs;
      $api->setEndpoint('pharos_pages');
      $api->setArguments(
        $args = array(
            'fields' => '*.*.*.*.*.*',
            'meta' => 'result_count,total_count,type',
            'filter[slug][eq]' => $slug,
            'filter[section][eq]' => $section
        )
      );
      return $api->getData();
    }


    public static function getContexts()
    {
      $api = new DirectUs;
      $api->setEndpoint('pharos_pages');
      $api->setArguments(
        $args = array(
            'fields' => 'section,hero_image_alt_text,hero_image.*',
            'meta' => 'result_count,total_count,type'
        )
      );
      return $api->getData();
    }
    public static function getByContext()
    {
      $api = new DirectUs;
      $api->setEndpoint('pharos_pages');
      $api->setArguments(
        $args = array(
            'fields' => 'section,hero_image.*',
            'meta' => 'result_count,total_count,type'
        )
      );
      return $api->getData();
    }

    public static function getBySection(string $section)
    {
      $api = new DirectUs();
      $api->setEndpoint('pharos_pages');
      $api->setArguments(
        $args = array(
            'fields' => '*.*.*.*.*.*',
            'meta' => 'result_count,total_count,type',
            'filter[section][eq]' => $section
        )
      );
      return $api->getData();
    }

    public static function find(string $slug)
    {

    }
}
