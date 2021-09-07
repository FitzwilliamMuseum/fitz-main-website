<?php

namespace App\Models;

use App\DirectUs;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Collection;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Cache;


class NewsArticles extends Model
{
    public static function list(string $sort = '-publication_date', int $limit = 3)
    {
      $api = new DirectUs;
      $api->setEndpoint('news_articles');
      $api->setArguments(
        $args = array(
            'fields' => '*.*.*.*',
            'meta' => 'result_count,total_count,type',
            'sort' => $sort,
            'limit' => $limit
        )
      );
      return $api->getData();
    }

    public static function paginateNews(request $request)
    {
      $perPage = 12;
      $offset = ($request->page -1) * $perPage ;
      $api = new DirectUs;
      $api->setEndpoint('news_articles');
      $api->setArguments(
        $args = array(
            'fields' => '*.*.*.*',
            'meta' => 'result_count,total_count,type',
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
      return $paginator;
    }

    public static function feedNews(request $request)
    {
      $perPage = 20;
      $offset = ($request->page -1) * $perPage ;
      $api = new DirectUs;
      $api->setEndpoint('news_articles');
      $api->setArguments(
        $args = array(
            'fields' => '*.*.*.*',
            'meta' => 'result_count,total_count,type',
            'fields' => 'id,article_title,article_body,article_excerpt,slug,publication_date,field_image.*',
            'sort' => '-id',
            'limit' => $perPage,
            'offset' => $offset
        )
      );
      $news = $api->getData();
      $currentPage = LengthAwarePaginator::resolveCurrentPage();
      $total = $news['meta']['total_count'];
      $paginator = new LengthAwarePaginator($news, $total, $perPage, $currentPage);
      return $paginator;
    }


    public static function find(string $slug)
    {
      $api = new DirectUs;
      $api->setEndpoint('news_articles');
      $api->setArguments(
        $args = array(
            'fields' => '*.*.*.*',
            'meta' => 'result_count,total_count,type',
            'filter[slug][eq]' => $slug
        )
      );
      return $api->getData();
    }
}
