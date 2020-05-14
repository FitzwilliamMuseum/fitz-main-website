<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Collection;
use Illuminate\Pagination\LengthAwarePaginator;
use App\MoreLikeThis;

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
    $api = $this->getApi();
    $api->setEndpoint('news_articles');
    $api->setArguments(
      $args = array(
          'fields' => '*.*.*.*',
          'meta' => '*',
          'sort' => '-id',
          'limit' => $perPage,
          'offset' => $offset
      )
    );
    $news = $api->getData();
    $currentPage = LengthAwarePaginator::resolveCurrentPage();
    $total = $news['meta']['total_count'];
    $paginator = new LengthAwarePaginator($news, $total, $perPage, $currentPage);
    $paginator->setPath('news');
    return view('news.index', compact('news', 'paginator'));
  }

  public function article($slug)
  {
    $api = $this->getApi();
    $api->setEndpoint('news_articles');
    $api->setArguments(
      $args = array(
          'fields' => '*.*.*.*',
          'meta' => '*',
          'filter[slug][eq]' => $slug
      )
    );
    $news = $api->getData();

    $mlt = new MoreLikeThis;
    $mlt->setLimit(3)->setType('news')->setQuery($slug);
    $records = $mlt->getData();
    return view('news.article', compact('news', 'records'));
  }

  public function atom()
  {
    $api = $this->getApi();
    $api->setEndpoint('news_articles');
    $api->setArguments(
      $args = array(
          'limit' => '20',
          'sort' => '-id',
          'fields' => 'id,article_title,article_body,article_excerpt,slug,publication_date,field_image.*'
      )
    );
    $items = $api->getData();
    $output = view('feedme.atom', compact('items'));

    return response($output, '200')->header('Content-Type', 'text/xml');
  }
}
