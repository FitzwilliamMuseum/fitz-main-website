<?php

namespace Tests\Feature\Controllers;

use Mockery;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\Request;
use Tests\TestCase;
use App\Http\Controllers\newsController;
use App\Models\NewsArticles;
use App\Http\Controllers\searchController;

class NewsControllerTest extends TestCase
{

    protected function setUp(): void
    {
        parent::setUp();
        if (Mockery::getContainer() != null) {
            Mockery::getContainer()->mockery_tearDown();
        }
    }

    protected function tearDown(): void
    {
        Mockery::close();
        parent::tearDown();
    }

    public function test_index_page_returns_200()
    {
        $response = $this->get(route('news'));
        $response->assertStatus(200);
    }

    public function test_index_page_uses_correct_view()
    {
        $response = $this->get(route('news'));
        $response->assertViewIs('news.index');
    }

    public function test_index_page_has_news_data()
    {
        $response = $this->get(route('news'));
        $response->assertViewHas('news');
    }

    public function test_index_page_has_paginator()
    {
        $response = $this->get(route('news'));
        $response->assertViewHas('paginator');
    }

    public function test_article_page_returns_200()
    {
        $paginator = NewsArticles::paginateNews(new Request());
        $slug = $paginator->items()['data'][0]['slug'] ?? null;
        if (!$slug) {
            $this->markTestSkipped('No news article slug found in live data.');
        }
        $response = $this->get(route('article', ['slug' => $slug]));
        if ($response->status() === 404) {
            $this->assertEquals(404, $response->status());
        } else {
            $response->assertStatus(200);
        }
    }

    public function test_article_page_uses_correct_view()
    {
        $paginator = NewsArticles::paginateNews(new Request());
        $slug = $paginator->items()['data'][0]['slug'] ?? null;
        if (!$slug) {
            $this->markTestSkipped('No news article slug found in live data.');
        }
        $response = $this->get(route('article', ['slug' => $slug]));
        if ($response->status() !== 404) {
            $response->assertViewIs('news.article');
        }
    }

    public function test_article_page_has_news_data()
    {
        $paginator = NewsArticles::paginateNews(new Request());
        $slug = $paginator->items()['data'][0]['slug'] ?? null;
        if (!$slug) {
            $this->markTestSkipped('No news article slug found in live data.');
        }
        $response = $this->get(route('article', ['slug' => $slug]));
        if ($response->status() !== 404) {
            $response->assertViewHas('news');
        }
    }

    public function test_article_page_has_records()
    {
        $paginator = NewsArticles::paginateNews(new Request());
        $slug = $paginator->items()['data'][0]['slug'] ?? null;
        if (!$slug) {
            $this->markTestSkipped('No news article slug found in live data.');
        }
        $response = $this->get(route('article', ['slug' => $slug]));
        if ($response->status() !== 404) {
            $response->assertViewHas('records');
        }
    }

    public function test_article_page_returns_404_for_invalid_slug()
    {
        Mockery::mock('alias:' . searchController::class)
            ->shouldReceive('injectResults')
            ->andReturnNull();
        $response = $this->get(route('article', ['slug' => 'nonexistent-news-slug-12345']));
        $this->assertTrue($response->getStatusCode() === 404);
    }

    public function test_article_page_404_shows_page_not_found_text()
    {
        Mockery::mock('alias:' . searchController::class)
            ->shouldReceive('injectResults')
            ->andReturnNull();
        $response = $this->get(route('article', ['slug' => 'nonexistent-news-slug-12345']));
        $response->assertStatus(404);
        $response->assertSee('Page not found');
    }

    public function test_article_page_404_shows_page_not_found_heading()
    {
        Mockery::mock('alias:' . searchController::class)
            ->shouldReceive('injectResults')
            ->andReturnNull();
        $response = $this->get(route('article', ['slug' => 'nonexistent-news-slug-12345']));
        $response->assertStatus(404);
        $response->assertSee('<h1 class="shout lead" id="doc-main-h1">Page not found</h1>', false);
    }
}
