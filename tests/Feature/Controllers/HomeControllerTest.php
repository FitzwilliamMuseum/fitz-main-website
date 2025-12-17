<?php

namespace Tests\Feature\Controllers;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Facade;
use App\Models\Carousels;
use App\Models\HomePage;
use App\Models\Exhibitions;
use App\Models\Shopify;
use App\Models\Galleries;
use App\Models\HomePageBanners;
use App\Models\HomePageHero;
use Mockery;

class HomeControllerTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();
    }

    protected function tearDown(): void
    {
        Mockery::close();
        parent::tearDown();
    }

    public function test_index_returns_status_200()
    {
        $response = $this->get(route('home'));
        $response->assertStatus(200);
    }

    public function test_index_returns_home_index_view()
    {
        $response = $this->get(route('home'));
        $response->assertViewIs('home.index');
    }

    public function test_index_view_has_carousel()
    {
        $response = $this->get(route('home'));
        $response->assertViewHas('carousel');
    }

    public function test_index_view_has_third_row()
    {
        $response = $this->get(route('home'));
        $response->assertViewHas('thirdRow');
    }

    public function test_index_view_has_fourth_row()
    {
        $response = $this->get(route('home'));
        $response->assertViewHas('fourthRow');
    }

    public function test_index_view_has_current()
    {
        $response = $this->get(route('home'));
        $response->assertViewHas('current');
    }

    public function test_index_view_has_shopify()
    {
        $response = $this->get(route('home'));
        $response->assertViewHas('shopify');
    }

    public function test_index_view_has_galleries()
    {
        $response = $this->get(route('home'));
        $response->assertViewHas('galleries');
    }

    public function test_index_view_has_exhibitions()
    {
        $response = $this->get(route('home'));
        $response->assertViewHas('exhibitions');
    }

    public function test_index_view_has_settings()
    {
        $response = $this->get(route('home'));
        $response->assertViewHas('settings');
    }

    public function test_index_view_has_banners()
    {
        $response = $this->get(route('home'));
        $response->assertViewHas('banners');
    }

    public function test_index_view_has_hero()
    {
        $response = $this->get(route('home'));
        $response->assertViewHas('hero');
    }
}
