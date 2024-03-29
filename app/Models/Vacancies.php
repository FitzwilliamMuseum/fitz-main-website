<?php

namespace App\Models;

use App\DirectUs;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;

class Vacancies extends Model
{
    protected static string $table = 'vacancies';

    /**
     * @return Collection
     */
    public static function getVacancies(): Collection
    {
        $directus = new Directus(
            self::$table,
            array(
                'fields' => '*.*.*',
                'meta' => '*',
                'sort' => '-expires',
                'filter[expires][gte]' => 'now'
            )
        );
        return collect($directus->getData());
    }

    /**
     * @param int $limit
     * @param Request $request
     * @return LengthAwarePaginator
     */
    public static function getArchived(int $limit, Request $request): LengthAwarePaginator
    {
        $directus = new Directus(
            self::$table,
            array(
                'fields' => '*.*.*',
                'meta' => '*',
                'sort' => '-expires',
                'filter[expires][lte]' => 'now',
                'limit' => $limit,
                'offset' => ($request['page'] - 1) * $limit,
            )
        );
        $vacancies = $directus->getData();
        return new LengthAwarePaginator($vacancies, $vacancies['meta']['filter_count'], 12, LengthAwarePaginator::resolveCurrentPage());
    }

    /**
     * @param $slug
     * @return array
     */
    public static function getVacancy($slug): array
    {
        $directus = new Directus(
            self::$table,
            array(
                'fields' => '*.*.*',
                'meta' => '*',
                'filter[slug][eq]' => $slug
            )
        );
        return $directus->getData();
    }
}
