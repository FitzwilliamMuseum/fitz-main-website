<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

use App\Models\Galleries;
use App\Models\Stubs;
use App\Models\CIIM;

class galleriesController extends Controller
{

  public function index()
  {
    $pages = Stubs::getLanding('galleries');
    $galleries = Galleries::list();
    return view('galleries.index', compact('galleries', 'pages'));
  }

  public function gallery($slug)
  {
    $galleries = Galleries::find($slug);
    if(empty($galleries['data'])){
      return response()->view('errors.404',[],404);
    }
    return view('galleries.gallery', compact('galleries'));
  }

  public static function getObjects(string $prirefs){
    return CIIM::findByPriRefs($prirefs);
  }
}
