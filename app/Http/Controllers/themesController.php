<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class themesController extends Controller
{

  public function index()
  {
    $api = $this->getApi();
    $api->setEndpoint('stubs_and_pages');
    $api->setArguments(
      $args = array(
          'fields' => '*.*.*.*',
          'meta' => 'result_count,total_count,type',
          'filter[section][eq]' => 'themes',
          'filter[landing_page][eq]' => '1'
      )
    );
    $pages = $api->getData();

    $api2 = $this->getApi();
    $api2->setEndpoint('themes');
    $api2->setArguments(
      $args = array(
          'fields' => '*.*.*.*',
          'meta' => 'result_count,total_count,type',
      )
    );
    $themes = $api2->getData();
    return view('themes.index', compact('themes', 'pages'));
  }

  public function theme($slug)
  {
    $api = $this->getApi();
    $api->setEndpoint('themes');
    $api->setArguments(
      $args = array(
          'fields' => '*.*.*.*',
          'meta' => 'result_count,total_count,type',
          'filter[slug][eq]' => $slug
      )
    );
    $themes = $api->getData();
    return view('themes.theme', compact('themes'));
  }
}
