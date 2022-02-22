<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;
use Illuminate\Http\Response;
use App\Models\Stubs;
use App\Models\Collections;
use App\Models\CIIM;

class collectionsController extends Controller
{

    /**
     * @return View
     */
  public function index(): View
  {
    $pages = Stubs::getLandingBySlug('about-us', 'collections');
    $collections = Collections::list();
    return view('collections.index', compact('collections', 'pages'));
  }

    /**
     * @param string $slug
     * @return View|Response
     */
  public function details(string $slug): View|Response
  {
    $collection = Collections::find($slug);
    if(empty($collection['data'])){
      return response()->view('errors.404',[],404);
    }
    return view('collections.details', compact('collection'));
  }

    /**
     * @param string $prirefs
     * @return array
     */
  public static function getObjects(string $prirefs): array
  {
    return CIIM::findByPriRefs($prirefs);
  }
}
