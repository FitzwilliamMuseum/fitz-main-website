<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\DirectUs;

class galleriesController extends Controller
{

    public function getApi(){
      $directus = new DirectUs;
      return $directus;
    }

    public function index()
    {
      $api = $this->getApi();
      $api->setEndpoint('stubs_and_pages');
      $api->setArguments(
        $args = array(
            'fields' => '*.*.*.*',
            'filter[section]' => 'galleries',
            'filter[landing_page][eq]' => '1',
            'meta' => '*'
        )
      );
      $pages = $api->getData();

      $api2 = $this->getApi();
      $api2->setEndpoint('galleries');
      $api2->setArguments(
        $args = array(
            'fields' => '*.*.*.*',
            'meta' => '*'
        )
      );
      $galleries = $api2->getData();

      return view('galleries.index', compact('galleries', 'pages'));
    }

    public function gallery($slug)
    {
      $api = $this->getApi();
      $api->setEndpoint('galleries');
      $api->setArguments(
        $args = array(
            'fields' => '*.*.*.*.*',
            'filter[slug]' => $slug,
            'meta' => '*'
        )
      );
      $galleries = $api->getData();

      return view('galleries.gallery', compact('galleries'));
    }
}
