<?php

namespace App\Models;

use App\DirectUs;


class Stubs extends Model
{
    public static function getPage(string $section, string $slug){
      $api = new DirectUs();
      $api->setEndpoint('stubs_and_pages');
      $api->setArguments(
        $args = array(
          'fields' => '*.*.*.*',
          'meta' => 'result_count,total_count,type',
          'filter[slug][eq]' => $slug,
          'filter[section][eq]' => $section,
        )
      );
      return $api->getData();
    }

    public static function findBySlug(string $slug){
      $api = new DirectUs();
      $api->setEndpoint('stubs_and_pages');
      $api->setArguments(
        $args = array(
          'fields' => '*.*.*.*',
          'meta' => 'result_count,total_count,type',
          'filter[slug][eq]' => $slug
        )
      );
      return $api->getData();
    }

    public static function findBySubSection(string $subsection){
      $api = new DirectUs;
      $api->setEndpoint('stubs_and_pages');
      $api->setArguments(
        $args = array(
          'fields' => '*.*.*.*',
          'meta' => 'result_count,total_count,type',
          'filter[subsection][eq]' => 'young-people'
        )
      );
      return $api->getData();
    }

    public static function getLanding(string $section){
      $api = new DirectUs();
      $api->setEndpoint('stubs_and_pages');
      $api->setArguments(
        $args = array(
          'fields' => '*.*.*.*',
          'meta' => 'result_count,total_count,type',
          'filter[landing_page][eq]' => '1',
          'filter[section][eq]' => $section,

        )
      );
      return $api->getData();
    }

    public static function getLandingBySlug(string $section, string $slug){
      $api = new DirectUs();
      $api->setEndpoint('stubs_and_pages');
      $api->setArguments(
        array(
          'filter[section]=' => $section,
          'filter[slug]=' => $slug,
          'filter[landing_page]' => '1',
          'fields' => '*.*.*'
        )
      );
      return $api->getData();
    }

    public static function getAssociated(string $section){
      $api = new DirectUs();
      $api->setEndpoint('stubs_and_pages');
      $api->setArguments(
        $args = array(
          'fields' => '*.*.*.*',
          'meta' => 'result_count,total_count,type',
          'filter[landing_page][null]' => '',
          'filter[section][eq]' => $section,
          'filter[associate_with_landing_page][eq]' => '1',
          'sort' => '-id'
        )
      );
      return $api->getData();
    }

    public static function getHighlightPage($id)
    {
      $api = new DirectUs;
      $api->setEndpoint('stubs_and_pages');
      $api->setArguments(
          $args = array(
              'fields' => '*.*.*',
              'meta' => 'result_count,total_count,type',
              'filter[id][eq]' => $id
          )
        );
      return $api->getData()['data'][0]['body'];
    }
}
