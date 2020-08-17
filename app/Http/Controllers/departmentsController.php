<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\DirectUs;

class departmentsController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {

      $api = new DirectUs;
      $api->setEndpoint('stubs_and_pages');
      $api->setArguments(
        $args = array(
            'fields' => '*.*.*',
            'filter[section]' => 'departments',
            'filter[landing_page]' => '1' ,
            'meta' => '*'
        )
      );
      $pages = $api->getData();
      $api2 = new DirectUs;
      $api2->setEndpoint('departments');
      $api2->setArguments(
        $args = array(
            'fields' => '*.*.*.*',
            'sort' => 'id',
            'meta' => '*'
        )
      );
      $departments = $api2->getData();
      return view('departments.index', compact('departments', 'pages'));
  }

  public function details($slug)
  {
      $api = new DirectUs;
      $api->setEndpoint('departments');
      $api->setArguments(
        $args = array(
            'fields' => '*.*.*.*',
            'filter[slug]' => $slug,
        )
      );
      $departments = $api->getData();
      return view('departments.details', compact('departments'));
  }
  public function conservation($slug)
  {
      $api = new DirectUs;
      $api->setEndpoint('conservation_areas');
      $api->setArguments(
        $args = array(
            'fields' => '*.*.*.*',
            'filter[slug]' => $slug,
        )
      );
      $departments = $api->getData();
      return view('departments.areas', compact('departments'));
  }
  public static function areas()
  {
    $api = new DirectUs;
    $api->setEndpoint('conservation_areas');
    $api->setArguments(
      $args = array(
          'fields' => '*.*.*.*',
      )
    );
    return $api->getData();
  }
}
