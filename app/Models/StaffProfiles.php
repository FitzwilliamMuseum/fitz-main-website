<?php

namespace App\Models;

use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use App\DirectUs;

class StaffProfiles extends Model
{
    /**
     * @var string $table
     */
    protected static string $table = 'staff_profiles';

    /**
     * @param Request $request
     * @return LengthAwarePaginator
     */
    public static function list(Request $request): LengthAwarePaginator
    {
        $perPage = 12;
        $offset = ($request['page'] - 1) * $perPage;
        $api = new DirectUs(
            self::$table,
            array(
                'fields' => '*.*.*.*',
                'meta' => '*',
                'limit' => $perPage,
                'offset' => $offset,
                'sort' => 'last_name',
                'filter[research_active][in]' => 'yes'
            )
        );
        $staff = $api->getData();
        $paginator = new LengthAwarePaginator(
            $staff,
            $staff['meta']['filter_count'],
            $perPage,
            LengthAwarePaginator::resolveCurrentPage()
        );
        $paginator->setPath(route('research-profiles'));
        return $paginator;
    }

    /**
     * @param Request $request
     * @return LengthAwarePaginator
     */
    public static function allstaff(Request $request): LengthAwarePaginator
    {
        $perPage = 24;
        if ($request['page'] > 1) {
            $offset = ($request['page'] - 1) * $perPage;
        } else {
            $offset = 0;
        }
        $directus = new DirectUs(
            self::$table,
            array(
                'fields' => '*.*.*',
                'limit' => $perPage,
                'offset' => $offset,
                'meta' => '*',
                'sort' => 'last_name',
                'filter[status][in]' => 'published'
            )
        );
        $staff = $directus->getData();
        $paginator = new LengthAwarePaginator(
            $staff,
            $staff['meta']['status_count']['published'],
            $perPage,
            LengthAwarePaginator::resolveCurrentPage()
        );
        $paginator->setPath(route('about.our.staff'));
        return $paginator;
    }


    public static function find(string $slug): array
    {
        $api = new DirectUs(
            self::$table,
            array(
                'fields' => '*.*.*.*',
                'meta' => '*',
                'filter[slug][eq]' => $slug
            )
        );
        return $api->getData();
    }

    /**
     * @param int $department
     * @return array
     */
    public static function findByDepartment(int $department): array
    {
        $api = new DirectUs(
            self::$table,
            array(
                'fields' => '*.*.*.*',
                'filter[departments_affiliated.department][in]' => $department,
            )
        );
        return $api->getData();
    }
}
