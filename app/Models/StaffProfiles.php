<?php

namespace App\Models;

use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use App\DirectUs;

class StaffProfiles extends Model
{
    /**
     * @param Request $request
     * @return LengthAwarePaginator
     */
    public static function list(Request $request): LengthAwarePaginator
    {
        $perPage = 12;
        $offset = ($request['page'] - 1) * $perPage;
        $api = new DirectUs;
        $api->setEndpoint('staff_profiles');
        $api->setArguments(
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
        $currentPage = LengthAwarePaginator::resolveCurrentPage();
        $total = $staff['meta']['filter_count'];
        $paginator = new LengthAwarePaginator($staff, $total, $perPage, $currentPage);
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
        $directus = new DirectUs;
        if ($request['page'] > 1) {
            $offset = ($request['page'] - 1) * $perPage;
        } else {
            $offset = 0;
        }
        $directus->setEndpoint('staff_profiles');
        $directus->setArguments(
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
        $currentPage = LengthAwarePaginator::resolveCurrentPage();
        $total = $staff['meta']['status_count']['published'];
        $paginator = new LengthAwarePaginator($staff, $total, $perPage, $currentPage);
        $paginator->setPath(route('about.our.staff'));
        return $paginator;
    }


    public static function find(string $slug): array
    {
        $api = new DirectUs;
        $api->setEndpoint('staff_profiles');
        $api->setArguments(
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
        $api = new DirectUs;
        $api->setEndpoint('staff_profiles');
        $api->setArguments(
            array(
                'fields' => '*.*.*.*',
                'filter[departments_affiliated.department][in]' => $department,
            )
        );
        return $api->getData();
    }
}
