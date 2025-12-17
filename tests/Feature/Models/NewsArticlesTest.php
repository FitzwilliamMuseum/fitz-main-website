<?php
namespace Tests\Feature\Models;

use Tests\TestCase;

class NewsArticlesTest extends TestCase
{
    
    public function test_list_returns_array()
    {
        $result = \App\Models\NewsArticles::list();
        $this->assertIsArray($result);
    }

    public function test_feature_returns_array()
    {
        $result = \App\Models\NewsArticles::feature();
        $this->assertIsArray($result);
    }

    public function test_list_contains_data_key()
    {
        $result = \App\Models\NewsArticles::list();
        $this->assertIsArray($result);
        $this->assertArrayHasKey('data', $result);
    }

    public function test_list_contains_meta_key()
    {
        $result = \App\Models\NewsArticles::list();
        $this->assertIsArray($result);
        $this->assertArrayHasKey('meta', $result);
    }

    public function test_feature_contains_data_key()
    {
        $result = \App\Models\NewsArticles::feature();
        $this->assertIsArray($result);
        $this->assertArrayHasKey('data', $result);
    }

    public function test_feature_contains_meta_key()
    {
        $result = \App\Models\NewsArticles::feature();
        $this->assertIsArray($result);
        $this->assertArrayHasKey('meta', $result);
    }

    public function test_find_returns_array()
    {
        $slug = 'test-slug';
        $result = \App\Models\NewsArticles::find($slug);
        $this->assertIsArray($result);
    }

    public function test_find_returns_array_with_data_key()
    {
        $slug = 'test-slug';
        $result = \App\Models\NewsArticles::find($slug);
        $this->assertArrayHasKey('data', $result);
    }
    public function test_find_returns_array_with_meta_key()
    {
        $slug = 'test-slug';
        $result = \App\Models\NewsArticles::find($slug);
        $this->assertArrayHasKey('meta', $result);
    }


    public function test_paginate_news_returns_paginator()
    {
        $request = new \Illuminate\Http\Request(['page' => 1]);
        $result = \App\Models\NewsArticles::paginateNews($request);
        $this->assertInstanceOf(\Illuminate\Pagination\LengthAwarePaginator::class, $result);
    }

    public function test_feed_news_returns_paginator()
    {
        $request = new \Illuminate\Http\Request(['page' => 1]);
        $result = \App\Models\NewsArticles::feedNews($request);
        $this->assertInstanceOf(\Illuminate\Pagination\LengthAwarePaginator::class, $result);
    }
}
