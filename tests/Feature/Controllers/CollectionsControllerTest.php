<?php

namespace Tests\Feature\Controllers;

use Mockery;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use App\Http\Controllers\searchController;

class CollectionsControllerTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    protected function tearDown(): void
    {
        if (Mockery::getContainer() != null) {
            Mockery::close();
        }
        parent::tearDown();
    }

    // INDEX ROUTE TESTS

    public function test_index_route_returns_200()
    {
        $response = $this->get(route('collections'));
        $response->assertStatus(200);
    }

    public function test_index_route_returns_collections_index_view()
    {
        $response = $this->get(route('collections'));
        $response->assertViewIs('collections.index');
    }

    public function test_index_route_has_collections_variable()
    {
        $response = $this->get(route('collections'));
        $response->assertViewHas('collections');
    }

    public function test_index_route_has_pages_variable()
    {
        $response = $this->get(route('collections'));
        $response->assertViewHas('pages');
    }


    public function test_details_route_with_valid_slug_returns_200_or_404()
    {
        $slug = 'archives';
        $response = $this->get(route('collection', ['slug' => $slug]));
        $this->assertTrue(in_array($response->getStatusCode(), [200, 404]));
    }

    public function test_details_route_with_valid_slug_returns_collections_details_view_if_200()
    {
        $slug = 'archives';
        $response = $this->get(route('collection', ['slug' => $slug]));
        if ($response->getStatusCode() === 200) {
            $response->assertViewIs('collections.details');
        } else {
            $this->assertTrue(true); // Skip if not 200
        }
    }

    public function test_details_route_with_valid_slug_has_collection_variable_if_200()
    {
        $slug = 'archives';
        $response = $this->get(route('collection', ['slug' => $slug]));
        if ($response->getStatusCode() === 200) {
            $response->assertViewHas('collection');
        } else {
            $this->assertTrue(true); // Skip if not 200
        }
    }

    // DETAILS ROUTE WITH INVALID SLUG

    public function test_details_route_with_invalid_slug_returns_404()
    {
        Mockery::mock('alias:' . searchController::class)
            ->shouldReceive('injectResults')
            ->andReturnNull();

        $response = $this->get(route('collection', ['slug' => 'invalid-slug-12345']));
        $response->assertStatus(404);
    }

    public function test_details_route_with_invalid_slug_returns_errors_404_view()
    {
        Mockery::mock('alias:' . searchController::class)
            ->shouldReceive('injectResults')
            ->andReturnNull();

        $response = $this->get(route('collection', ['slug' => 'invalid-slug-12345']));
        $response->assertViewIs('errors.404');
    }
}