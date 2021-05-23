<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\DirectUs;
use Solarium\Client;
use Solarium\Core\Client\Adapter\Curl;
use Symfony\Component\EventDispatcher\EventDispatcher;
use Solarium\Exception;
use Illuminate\Support\Facades\Cache;


class departmentsController extends Controller
{
  protected $client;

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
            'filter[landing_page][eq]' => '1' ,
            'meta' => 'result_count,total_count,type'
        )
      );
      $pages = $api->getData();
      $api2 = new DirectUs;
      $api2->setEndpoint('departments');
      $api2->setArguments(
        $args = array(
            'fields' => '*.*.*.*',
            'sort' => 'title',
            'meta' => 'result_count,total_count,type'
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
            'filter[slug][eq]' => $slug,
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
            'filter[slug][eq]' => $slug,
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
          'fields' => '*.*.*.*.*',
      )
    );
    return $api->getData();
  }
  public static function areasData($slug)
  {
    $api = new DirectUs;
    $api->setEndpoint('conservation_areas');
    $api->setArguments(
      $args = array(
          'fields' => '*.*.*.*.*',
          'filter[slug][eq]' => $slug,
      )
    );
    return $api->getData();
  }


  public static function conservationblog()
  {
    $expiresAt = now()->addMinutes(3600);
    $key = md5('conservation-blog-posts');
    if (Cache::has($key)) {
        $data = Cache::store('file')->get($key);
    } else {
        $configSolr = \Config::get('solarium');
        $client = new Client(new Curl(), new EventDispatcher(), $configSolr);
        $query = $client->createSelect();
        $query->setQuery('contentType:conservationblog title:*');
        $query->setRows(3);
        $data = $client->select($query);
        $data = $data->getDocuments();
        Cache::store('file')->put($key, $data, $expiresAt);
    }
    return $data;
  }
  public static function hkiblog()
  {
    $expiresAt = now()->addMinutes(3600);
    $key = md5('hki-blog-posts');
    if (Cache::has($key)) {
        $data = Cache::store('file')->get($key);
    } else {
        $configSolr = \Config::get('solarium');
        $client = new Client(new Curl(), new EventDispatcher(), $configSolr);
        $query = $client->createSelect();
        $query->setQuery('contentType:hkiblog title:*');
        $query->setRows(3);
        $data = $client->select($query);
        $data = $data->getDocuments();
        Cache::store('file')->put($key, $data, $expiresAt);
    }
    return $data;
  }
}
