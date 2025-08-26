<?php

namespace Tests\Feature\Controllers;

use Mockery;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Http\Controllers\searchController;

class DepartmentsControllerTest extends TestCase
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

    // Index tests
    public function test_index_returns_successful_response()
    {
        $response = $this->get(route('departments'));
        $response->assertStatus(200);
    }

    public function test_index_returns_correct_view()
    {
        $response = $this->get(route('departments'));
        $response->assertViewIs('departments.index');
    }

    public function test_index_view_has_expected_data()
    {
        $response = $this->get(route('departments'));
        $response->assertViewHasAll(['departments', 'pages']);
    }

    // Details tests
    public function test_details_returns_successful_response()
    {
        $departments = \App\Models\Departments::list();
        if (empty($departments['data'][0])) {
            $this->markTestSkipped('No departments found in the API.');
        }
        $department = collect($departments['data'])->first();
        if (empty($department['slug'])) {
            $this->markTestSkipped('No valid department slug found.');
        }
        $response = $this->get(route('department', ['slug' => $department['slug']]));
        $response->assertStatus(200);
    }

    public function test_details_returns_correct_view()
    {
        $departments = \App\Models\Departments::list();
        if (empty($departments['data'][0])) {
            $this->markTestSkipped('No departments found in the API.');
        }
        $department = collect($departments['data'])->first();
        if (empty($department['slug'])) {
            $this->markTestSkipped('No valid department slug found.');
        }
        $response = $this->get(route('department', ['slug' => $department['slug']]));
        $response->assertViewIs('departments.details');
    }

    public function test_details_view_has_expected_data()
    {
        $departments = \App\Models\Departments::list();
        if (empty($departments['data'][0])) {
            $this->markTestSkipped('No departments found in the API.');
        }
        $department = collect($departments['data'])->first();
        if (empty($department['slug'])) {
            $this->markTestSkipped('No valid department slug found.');
        }
        $response = $this->get(route('department', ['slug' => $department['slug']]));
        $response->assertViewHasAll(['department', 'staff']);
    }

    // Invalid slug tests
    public function test_details_returns_404_for_invalid_slug()
    {
        Mockery::mock('alias:' . searchController::class)
            ->shouldReceive('injectResults')
            ->andReturnNull();
        $response = $this->get(route('department', ['slug' => 'non-existent-slug']));
        $response->assertStatus(404);
    }

    public function test_details_404_page_contains_not_found_text()
    {
        Mockery::mock('alias:' . searchController::class)
            ->shouldReceive('injectResults')
            ->andReturnNull();
        $response = $this->get(route('department', ['slug' => 'non-existent-slug']));
        $response->assertSee('Page not found');
    }

    public function test_details_404_page_contains_not_found_heading()
    {
        Mockery::mock('alias:' . searchController::class)
            ->shouldReceive('injectResults')
            ->andReturnNull();
        $response = $this->get(route('department', ['slug' => 'non-existent-slug']));
        $response->assertSee('<h1 class="shout lead" id="doc-main-h1">Page not found</h1>', false);
    }

    // Conservation tests
    public function test_conservation_returns_successful_response()
    {
        $areas = \App\Models\ConservationAreas::list();
        if (empty($areas['data'])) {
            $this->markTestSkipped('No conservation areas found in the API.');
        }
        $area = collect($areas['data'])->first();
        $response = $this->get(route('conservation-care', ['slug' => $area['slug']]));
        $response->assertStatus(200);
    }

    public function test_conservation_returns_correct_view()
    {
        $areas = \App\Models\ConservationAreas::list();
        if (empty($areas['data'])) {
            $this->markTestSkipped('No conservation areas found in the API.');
        }
        $area = collect($areas['data'])->first();
        $response = $this->get(route('conservation-care', ['slug' => $area['slug']]));
        $response->assertViewIs('departments.areas');
    }

    public function test_conservation_view_has_departments_data()
    {
        $areas = \App\Models\ConservationAreas::list();
        if (empty($areas['data'])) {
            $this->markTestSkipped('No conservation areas found in the API.');
        }
        $area = collect($areas['data'])->first();
        $response = $this->get(route('conservation-care', ['slug' => $area['slug']]));
        $response->assertViewHas('departments');
    }
}
