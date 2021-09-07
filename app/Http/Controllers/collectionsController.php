<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\Stubs;
use App\Models\Collections;
use App\Models\FindMoreLikeThis;
use App\Models\CIIM;

class collectionsController extends Controller
{

  /**
  * Display a listing of the resource.
  *
  * @return \Illuminate\Http\Response
  */
  public function index()
  {
    $pages = Stubs::getLandingBySlug('about-us', 'collections');
    $collections = Collections::list();
    return view('collections.index', compact('collections', 'pages'));
  }

  public function details(string $slug)
  {
    $collection = Collections::find($slug);
    if(empty($collection['data'])){
      return response()->view('errors.404',[],404);
    }
    return view('collections.details', compact('collection'));
  }

  public static function getObjects(string $prirefs){
    return CIIM::findByPriRefs($prirefs);
  }
}
