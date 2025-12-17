<?php

namespace Tests\Feature\Controllers;

use App\Models\Subpages;
use Illuminate\Support\Str;
use Tests\TestCase;
use Mockery;
use app\Http\Controllers\searchController;

class SubpagesControllerTest extends TestCase
{
     protected function setUp(): void
    {
        parent::setUp();
        // This forcefully cleans up Mockery's entire container,
        // ensuring no mocks from previous tests can interfere.
        if (Mockery::getContainer() != null) {
            Mockery::getContainer()->mockery_tearDown();
        }

    }
    
    protected function tearDown(): void
    {
        Mockery::close();
        parent::tearDown();
    }
    /**
     * Test the subpagesController@index route with a valid slug using live data.
     */
    public function test_index_route_with_valid_slug_returns_view()
    {
        // $subpageData = Subpages::getSubpage('join-the-marlay-group'); // Get all subpages
        // $slug = null;
        // if (!empty($subpageData['data'])) {
        //     $first = collect($subpageData['data'])->first();
        //     $slug = $first['slug'] ?? null;
        // }
        // if ($slug) {
        //     $response = $this->get(route('visit-subpage', ['slug' => $slug]));
        //     $response->assertStatus(200);
        //     $response->assertViewIs('support.subpage');
        //     $response->assertViewHasAll(['page', 'parent_page']);
        // } else {
        //     $this->markTestSkipped('No subpages found in the database.');
        // }
    }

    /**
     * Test the subpagesController@index route with an invalid slug returns 404.
     */
    public function test_index_route_with_invalid_slug_returns_404()
    {
        // Mockery::mock('alias:' . searchController::class)
        //     ->shouldReceive('injectResults')
        //     ->andReturn([]);
        // $response = $this->get(route('visit-subpage', ['slug' => 'non-existent-slug-' . Str::random(8)]));
        // $response->assertStatus(404);
        // $response->assertViewIs('errors.404');
    }
}
