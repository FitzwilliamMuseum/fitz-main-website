<?php

namespace App\Models;
use App\DirectUs;
use Illuminate\Support\Collection;

class Vacancies extends Model
{
    /**
     * @return Collection
     */
    public static function getVacancies(): Collection
    {
      $directus = new Directus();
      $directus->setEndpoint('vacancies');
      $directus->setArguments(
          array(
            'fields' => '*.*.*',
            'meta' => '*',
            'sort' => '-expires',
            'filter[expires][gte]' => 'now'
          )
      );
      return collect($directus->getData());
    }


    public static function getArchived(): Collection
    {
      $directus = new Directus();
      $directus->setEndpoint('vacancies');
      $directus->setArguments(
          array(
            'fields' => '*.*.*',
            'meta' => '*',
            'sort' => '-expires',
            'filter[expires][lte]' => 'now'
          )
      );
      return collect($directus->getData());
    }

    /**
     * @param $slug
     * @return array
     */
    public static function getVacancy($slug): array
    {
      $directus = new Directus();
      $directus->setEndpoint('vacancies');
      $directus->setArguments(
          array(
            'fields' => '*.*.*',
            'meta' => '*',
            'filter[slug][eq]' => $slug
          )
      );
      return $directus->getData();
    }
}
