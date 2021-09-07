<?php

namespace App\Models;
use App\DirectUs;

class Vacancies extends Model
{
    public static function getVacancies(){
      $directus = new Directus();
      $directus->setEndpoint('vacancies');
      $directus->setArguments(
        $args = array(
          'fields' => '*.*.*',
          'meta' => '*',
          'sort' => '-expires'
        )
      );
      return collect($directus->getData());
    }

    public static function getVacancy($slug){
      $directus = new Directus();
      $directus->setEndpoint('vacancies');
      $directus->setArguments(
        $args = array(
          'fields' => '*.*.*',
          'meta' => '*',
          'filter[slug][eq]' => $slug
        )
      );
      return $directus->getData();
    }
}