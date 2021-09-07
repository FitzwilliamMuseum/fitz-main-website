<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

use App\Models\Stubs;
use App\Models\FindMoreLikeThis;

class pagesController extends Controller
{
  /**
  * Display a listing of the resource.
  *
  * @return \Illuminate\Http\Response
  */
  public function index($section, $slug)
  {
    $pages = Stubs::getPage($section, $slug);
    $records = FindMoreLikeThis::find($slug, 'page');
    if(empty($pages['data'])){
      return response()->view('errors.404',[],404);
    }
    return view('pages.index', compact('pages', 'records'));
  }

  public function landing($section)
  {
    $pages = Stubs::getLanding($section);
    $associated = Stubs::getAssociated($section);
    if(empty($pages['data'])){
      return response()->view('errors.404',[],404);
    }
    return view('pages.landing', compact('pages', 'associated'));
  }

  public static function injectPages(string $section = '', string $slug = '')
  {
      return Stubs::getPage($section, $slug);
  }
}
