<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class pagesController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index($section, $slug)
  {
      $api = $this->getApi();
      $api->setEndpoint('stubs_and_pages');
      $api->setArguments(
        $args = array(
            'fields' => '*.*.*.*',
            'meta' => '*',
            'filter[slug][eq]' => $slug,
            'filter[section][eq]' => $section,
        )
      );
      $pages = $api->getData();
      return view('pages.index', compact('pages'));
  }

  public function landing($section)
  {
    $api = $this->getApi();
    $api->setEndpoint('stubs_and_pages');
    $api->setArguments(
      $args = array(
          'fields' => '*.*.*.*',
          'meta' => '*',
          'filter[landing_page][null]' => '',
          'filter[section][eq]' => $section,
          'filter[associate_with_landing_page][eq]' => '1'
      )
    );
    $associated = $api->getData();

    $api2 = $this->getApi();
    $api2->setEndpoint('stubs_and_pages');
    $api2->setArguments(
      $args = array(
          'fields' => '*.*.*.*',
          'meta' => '*',
          'filter[landing_page][eq]' => '1',
          'filter[section][eq]' => $section,
      )
    );
    $pages = $api2->getData();
    return view('pages.landing', compact('pages', 'associated'));
  }
}
