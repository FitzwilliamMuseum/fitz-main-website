<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\Stubs;
use App\Models\Themes;

class themesController extends Controller
{

  public function index()
  {
    $pages = Stubs::getLanding('themes');
    $themes = Themes::list();
    return view('themes.index', compact('themes', 'pages'));
  }

  public function theme($slug)
  {
    $themes = Themes::details($slug);
    if(empty($themes['data'])){
      return response()->view('errors.404',[],404);
    }
    return view('themes.theme', compact('themes'));
  }
}
