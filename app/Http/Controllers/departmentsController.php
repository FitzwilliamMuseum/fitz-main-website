<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Solarium\Client;
use Solarium\Core\Client\Adapter\Curl;
use Symfony\Component\EventDispatcher\EventDispatcher;
use Solarium\Exception;
use Illuminate\Support\Facades\Cache;
use App\DirectUs;
use App\Models\Stubs;
use App\Models\Departments;
use App\Models\StaffProfiles;
use App\Models\ConservationAreas;
use App\Models\ConservationBlog;

class departmentsController extends Controller
{

  /**
  * Display a listing of the resource.
  *
  * @return \Illuminate\Http\Response
  */
  public function index()
  {
    $pages = Stubs::getLandingBySlug('about-us', 'departments');
    $departments = Departments::list();
    return view('departments.index', compact('departments', 'pages'));
  }

  public function details($slug)
  {
    $departments = Departments::find($slug);
    $staff = StaffProfiles::findByDepartment($departments['data'][0]['id']);
    if(empty($departments['data'])){
      return response()->view('errors.404',[],404);
    }
    return view('departments.details', compact('departments', 'staff'));
  }

  public function conservation($slug)
  {
    $departments = ConservationAreas::find($slug);
    return view('departments.areas', compact('departments'));
  }

  public static function areas()
  {
    return ConservationAreas::list();
  }

  public static function areasData($slug)
  {
    return ConservationAreas::find($slug);
  }


  public static function conservationblog()
  {
    $expiresAt = now()->addMinutes(3600);
    $key = md5('conservation-blog-posts');
    if (Cache::has($key)) {
      $data = Cache::store('file')->get($key);
    } else {
      $data = ConservationBlog::list();
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
