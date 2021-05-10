<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class visitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $api = $this->getApi();
        $api->setEndpoint('stubs_and_pages');
        $api->setArguments(
          $args = array(
              'fields' => '*.*.*.*',
              'meta' => 'result_count,total_count,type',
              'filter[section][eq]' => 'visit-us',
              'filter[landing_page][null]' => '',
              'filter[associate_with_landing_page][eq]' => '1'
          )
        );
        $associated = $api->getData();

        $api2 = $this->getApi();
        $api2->setEndpoint('stubs_and_pages');
        $api2->setArguments(
          $args = array(
              'fields' => '*.*.*.*',
              'meta' => 'result_count,total_count,type',
              'filter[section][eq]' => 'visit-us',
              'filter[landing_page][eq]' => '1',
          )
        );
        $pages = $api2->getData();

        $api3 = $this->getApi();
        $api3->setEndpoint('directions');
        $api3->setArguments(
          $args = array(
              'fields' => '*.*.*.*',
              'meta' => 'result_count,total_count,type',
              'sort' => '-id'
          )
        );
        $directions = $api3->getData();

        $api4 = $this->getApi();
        $api4->setEndpoint('floorplans_guides');
        $api4->setArguments(
          $args = array(
              'fields' => '*.*.*.*',
              'meta' => 'result_count,total_count,type',
              'sort' => 'id',
              '[filter][type][eq]' => 'floor_plan',
          )
        );
        $floors = $api4->getData();
        return view('visit/index', compact('pages', 'associated', 'directions', 'floors'));
    }

}
