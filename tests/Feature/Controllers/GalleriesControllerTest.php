<?php

namespace Tests\Feature\Controllers;
use Mockery;
use App\Models\Galleries;
use App\Models\Stubs;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Http\Controllers\searchController; 

class GalleriesControllerTest extends TestCase
{
    use WithFaker;
    
    protected function setUp(): void
    {
        parent::setUp();

    }
    protected function tearDown(): void
    {
        \Mockery::close();
        parent::tearDown();
    }

    public function test_index_page_loads_with_data()
    {
        $response = $this->get(route('galleries'));
        $response->assertStatus(200);
        $response->assertViewIs('galleries.index');
        $response->assertViewHasAll(['galleries', 'pages']);
    }

    public function test_gallery_page_loads_or_404()
    {
        $galleries = Galleries::list();
        $first = collect($galleries['data'] ?? [])->first();
        $slug = $first['slug'] ?? null;
        if ($slug) {
            $response = $this->get(route('gallery', ['slug' => $slug]));
            $response->assertStatus(200);
            $response->assertViewIs('galleries.gallery');
            $response->assertViewHas('gallery');
        } else {
            $this->markTestSkipped('No gallery slug found in live data.');
        }
    }

    public function test_gallery_page_returns_404_for_invalid_slug()
    {
        Mockery::mock('alias:' . searchController::class)
            ->shouldReceive('injectResults')
            ->andReturnNull();
        $response = $this->get(route('gallery', ['slug' => 'nonexistent-gallery-slug-12345']));
        $this->assertTrue($response->getStatusCode() === 404);
        $response->assertStatus(404);
        $response->assertViewIs('errors.404');
    }
}
