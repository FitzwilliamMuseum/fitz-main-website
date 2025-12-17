<?php

namespace Tests\Feature\Controllers;

use Mockery;
use App\Models\Exhibitions;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Http\Controllers\searchController;

class ExhibitionsControllerTest extends TestCase
{
    use WithFaker;

    protected function setUp(): void
    {
        parent::setUp();
    }

    protected function tearDown(): void
    {
        Mockery::close();
        parent::tearDown();
    }

    // Index page tests
    public function test_index_page_returns_200()
    {
        $response = $this->get(route('exhibitions'));
        $response->assertStatus(200);
    }

    public function test_index_page_uses_correct_view()
    {
        $response = $this->get(route('exhibitions'));
        $response->assertViewIs('exhibitions.index');
    }

    public function test_index_page_has_current_data()
    {
        $response = $this->get(route('exhibitions'));
        $response->assertViewHas('current');
    }

    public function test_index_page_has_pages_data()
    {
        $response = $this->get(route('exhibitions'));
        $response->assertViewHas('pages');
    }

    public function test_index_page_has_archive_data()
    {
        $response = $this->get(route('exhibitions'));
        $response->assertViewHas('archive');
    }

    public function test_index_page_has_future_data()
    {
        $response = $this->get(route('exhibitions'));
        $response->assertViewHas('future');
    }

    public function test_index_page_has_displays_data()
    {
        $response = $this->get(route('exhibitions'));
        $response->assertViewHas('displays');
    }

    public function test_index_page_has_banners_data()
    {
        $response = $this->get(route('exhibitions'));
        $response->assertViewHas('banners');
    }

    // Archive page tests
    public function test_archive_page_returns_200()
    {
        $response = $this->get(route('archive'));
        $response->assertStatus(200);
    }

    public function test_archive_page_uses_correct_view()
    {
        $response = $this->get(route('archive'));
        $response->assertViewIs('exhibitions.archives');
    }

    public function test_archive_page_has_archive_data()
    {
        $response = $this->get(route('archive'));
        $response->assertViewHas('archive');
    }

    // Details page tests
    public function test_details_page_returns_200_for_valid_slug()
    {
        $exhibitions = Exhibitions::list();
        $first = collect($exhibitions['data'] ?? [])->first();
        $slug = $first['slug'] ?? 'made-in-ancient-egypt';

        $response = $this->get(route('exhibition', ['slug' => $slug]));
        $response->assertStatus(200);
    }

    public function test_details_page_uses_correct_view_for_valid_slug()
    {
        $exhibitions = Exhibitions::list();
        $first = collect($exhibitions['data'] ?? [])->first();
        $slug = $first['slug'] ?? 'made-in-ancient-egypt';

        $response = $this->get(route('exhibition', ['slug' => $slug]));
        $response->assertViewIs('exhibitions.details');
    }

    public function test_details_page_has_exhibition_data_for_valid_slug()
    {
        $exhibitions = Exhibitions::list();
        $first = collect($exhibitions['data'] ?? [])->first();
        $slug = $first['slug'] ?? 'made-in-ancient-egypt';

        $response = $this->get(route('exhibition', ['slug' => $slug]));
        $response->assertViewHas('exhibition');
    }

    // Invalid slug tests
    public function test_details_page_returns_404_for_invalid_slug()
    {
        Mockery::mock('alias:' . searchController::class)
            ->shouldReceive('injectResults')
            ->andReturnNull();

        $response = $this->get(route('exhibition', ['slug' => 'nonexistent-exhibition-slug-12345']));
        $response->assertStatus(404);
    }

    public function test_details_page_shows_not_found_message_for_invalid_slug()
    {
        Mockery::mock('alias:' . searchController::class)
            ->shouldReceive('injectResults')
            ->andReturnNull();

        $response = $this->get(route('exhibition', ['slug' => 'nonexistent-exhibition-slug-12345']));
        $response->assertSee('Page not found');
    }

    public function test_details_page_shows_not_found_heading_for_invalid_slug()
    {
        Mockery::mock('alias:' . searchController::class)
            ->shouldReceive('injectResults')
            ->andReturnNull();

        $response = $this->get(route('exhibition', ['slug' => 'nonexistent-exhibition-slug-12345']));
        $response->assertSee('<h1 class="shout lead" id="doc-main-h1">Page not found</h1>', false);
    }
}
