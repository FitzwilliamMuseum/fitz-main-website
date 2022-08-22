<?php

namespace App\Models;

use App\DirectUs;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;

class ResearchProjects extends Model
{
    /**
     * @var string $table
     */
    protected static string $table = 'research_projects';

    /**
     * @param Request $request
     * @param string $sort
     * @return LengthAwarePaginator
     */
    public static function list(Request $request, string $sort = 'title'): LengthAwarePaginator
    {
        $perPage = 12;
        $offset = ($request['page'] - 1) * $perPage;
        $api = new DirectUs(
            self::$table,
            array(
                'fields' => '*.*.*.*',
                'meta' => '*',
                'sort' => $sort,
                'limit' => $perPage,
                'offset' => $offset
            )
        );
        $projects = $api->getData();
        $paginator = new LengthAwarePaginator(
            $projects,
            $projects['meta']['total_count'],
            $perPage,
            LengthAwarePaginator::resolveCurrentPage()
        );
        $paginator->setPath(route('research-projects'));
        return $paginator;
    }

    /**
     * @param string $slug
     * @return array
     */
    public static function find(string $slug): array
    {
        $api = new DirectUs(
            self::$table,
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
        $api = new DirectUs(
            self::$table,
            array(
                'fields' => '*.*.*.*',
                'meta' => 'result_count,total_count,type',
                'filter[departments_involved][contains]' => 'Learning'
            )
        );
        return $api->getData();
    }

    /**
     * @param string $sort
     * @param int $limit
     * @return array
     */
    public static function listSimple(string $sort = 'title', int $limit = 100): array
    {
        $api = new DirectUs(
            self::$table,
            array(
                'fields' => '*.*.*.*',
                'meta' => 'result_count,total_count,type',
                'sort' => $sort,
                'limit' => $limit
            )
        );
        return $api->getData();
    }
}
