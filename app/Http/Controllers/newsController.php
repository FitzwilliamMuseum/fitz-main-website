<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

class newsController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index(Request $request)
  {
    $perPage = 6;
    $offset = ($request->page -1) * $perPage ;
    $response = Http::get('https://content.fitz.ms/fitz-website/items/news_articles?fields=*.*.*&sort=-id&limit=6&meta=*&offset=' . $offset);
    $news = $response->json();
    $currentPage = LengthAwarePaginator::resolveCurrentPage();
    $total = $news['meta']['total_count'];
    $paginator = new LengthAwarePaginator($news, $total, $perPage, $currentPage);
    $paginator->setPath('news');
    return view('news.index', compact('news', 'paginator'));
  }

  public function article($slug)
  {
    $response = Http::get('https://content.fitz.ms/fitz-website/items/news_articles?filter[slug]=' . $slug . '&fields=*.*.*');
    $news = $response->json();
    return view('news.article', compact('news'));
  }
  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function show($id)
  {
      //
  }

  /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function paginate($items, $perPage = 10, $page = null, $options = [])
    {
        $page = $page ?: (Paginator::resolveCurrentPage() ?: 1);
        $items = $items instanceof Collection ? $items : Collection::make($items);
        return new LengthAwarePaginator($items->forPage($page, $perPage), $items->count(), $perPage, $page, $options);
    }
}
