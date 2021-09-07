<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

use App\MoreLikeThis;
use App\Models\NewsArticles;
use App\Models\FindMoreLikeThis;

class newsController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */


  public function index(Request $request)
  {
    $paginator = NewsArticles::paginateNews($request);
    $news      = $paginator->items();
    return view('news.index', compact('news', 'paginator'));
  }

  public function article($slug)
  {
    $news    = NewsArticles::find($slug);
    $records = FindMoreLikeThis::find($slug, 'news');
    if(empty($news['data'])){
      return response()->view('errors.404',[],404);
    }
    return view('news.article', compact('news', 'records'));
  }
}
