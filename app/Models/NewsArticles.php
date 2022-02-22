<?php

namespace App\Models;

use App\DirectUs;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;


class NewsArticles extends Model
{
    /**
     * @param string $sort
     * @param int $limit
     * @return array
     */
    public static function list(string $sort = '-publication_date', int $limit = 3): array
    {
      $api = new DirectUs;
      $api->setEndpoint('news_articles');
      $api->setArguments(
          array(
              'fields' => '*.*.*.*',
              'meta' => 'result_count,total_count,type',
              'sort' => $sort,
              'limit' => $limit
          )
      );
      return $api->getData();
    }

    public static function feature(string $sort = '-publication_date', int $limit = 3): array
    {
      $api = new DirectUs;
      $api->setEndpoint('news_articles');
      $api->setArguments(
          array(
              'fields' => '*.*.*.*',
              'meta' => 'result_count,total_count,type',
              'sort' => $sort,
              'limit' => $limit,
              'filter[feature_front_page][eq]' => 'yes'
          )
      );
      return $api->getData();
    }

    /**
     * @param Request $request
     * @return LengthAwarePaginator
     */
    public static function paginateNews(Request $request): LengthAwarePaginator
    {
      $perPage = 12;
      $offset = ($request['page'] -1) * $perPage ;
      $api = new DirectUs;
      $api->setEndpoint('news_articles');
      $api->setArguments(
          array(
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

    /**
     * @param Request $request
     * @return LengthAwarePaginator
     */
    public static function feedNews(Request $request): LengthAwarePaginator
    {
      $perPage = 20;
      $offset = ($request['page'] -1) * $perPage ;
      $api = new DirectUs;
      $api->setEndpoint('news_articles');
      $api->setArguments(
          array(
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
      return new LengthAwarePaginator($news, $total, $perPage, $currentPage);
    }

    /**
     * @param string $slug
     * @return array
     */
    public static function find(string $slug): array
    {
      $api = new DirectUs;
      $api->setEndpoint('news_articles');
      $api->setArguments(
          array(
              'fields' => '*.*.*.*',
              'meta' => 'result_count,total_count,type',
              'filter[slug][eq]' => $slug
          )
      );
      return $api->getData();
    }
}
