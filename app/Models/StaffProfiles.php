<?php

namespace App\Models;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Collection;
use Illuminate\Pagination\LengthAwarePaginator;
use App\DirectUs;

class StaffProfiles extends Model
{
    public static function list()
    {
      $api = new DirectUs;
      $api->setEndpoint('staff_profiles');
      $api->setArguments(
        $args = array(
            'fields' => '*.*.*.*',
            'meta' => 'result_count,total_count,type',
            'sort' => 'last_name',
            'filter[research_active][in]' => 'yes'
        )
      );
      return $api->getData();
    }

    public static function allstaff(Request $request){
      $perPage = 24;
      $directus = new DirectUs;
      if($request->page > 1){
        $offset = ($request->page -1) * $perPage;
      } else {
        $offset = 0;
      }
      $directus->setEndpoint('staff_profiles');
      $directus->setArguments(
        $args = array(
          'fields' => '*.*.*',
          'limit' => $perPage,
          'offset' => $offset,
          'meta' => '*',
          'sort' => 'last_name',
          'filter[status][in]'  => 'published'
        )
      );
      $staff = $directus->getData();
      $currentPage = LengthAwarePaginator::resolveCurrentPage();
      $total = $staff['meta']['status_count']['published'];
      $paginator = new LengthAwarePaginator($staff, $total, $perPage, $currentPage);
      $paginator->setPath(route('about.our.staff'));
      return $paginator;
    }

    public static function find($slug)
    {
      $api = new DirectUs;
      $api->setEndpoint('staff_profiles');
      $api->setArguments(
        $args = array(
            'fields' => '*.*.*.*',
            'meta' => '*',
            'filter[slug][eq]' => $slug
        )
      );
      return $api->getData();
    }

    public static function findByDepartment(int $department)
    {
      $api = new DirectUs;
      $api->setEndpoint('staff_profiles');
      $api->setArguments(
        $args = array(
            'fields' => '*.*.*.*',
            'filter[departments_affiliated.department][in]' => $department,
        )
      );
      return $api->getData();
    }
}
