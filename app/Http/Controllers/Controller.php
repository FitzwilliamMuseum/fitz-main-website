<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\DirectUs;
use App\FitzElastic\Elastic;
use Artisan;

class Controller extends BaseController
{
  use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

  public function getApi()
  {
    $directus = new DirectUs;
    return $directus;
  }

  public function clearCache()
  {
    Artisan::call('cache:clear');
    return "Cache is cleared";
  }

  public function getElastic()
  {
    return new Elastic();
  }
}
