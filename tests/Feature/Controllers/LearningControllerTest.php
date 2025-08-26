<?php

namespace Tests\Feature\Controllers;

use App\Http\Controllers\learningController;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use Mockery;
use App\Http\Controllers\searchController;
use PHPUnit\Framework\Attributes\RunTestsInSeparateProcesses;
use PHPUnit\Framework\Attributes\PreserveGlobalState;

#[RunTestsInSeparateProcesses]
#[PreserveGlobalState(false)] 

class LearningControllerTest extends TestCase
{
    use WithFaker;

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

    // Index page
    public function test_index_page_status_200()
    {
        $response = $this->get(route('ltd'));
        $response->assertStatus(200);
    }

    // LookThinkDo Main
    public function test_look_think_do_main_returns_view()
    {
        $response = $this->get(route('ltd'));
        $response->assertViewIs('learning.lookthinkdomain');
    }

    // LookThinkDo Activity
    public function test_look_think_do_activity_returns_view()
    {
        $ltd = \App\Models\LookThinkDo::list();
        $first = collect($ltd['data'] ?? [])->first();
        $slug = $first['slug'] ?? null;
        if (!$slug) {
            $this->markTestSkipped('No LookThinkDo activity slug found in live data.');
        }
        $response = $this->get(route('ltd-activity', ['slug' => $slug]));
        $response->assertViewIs('learning.lookthinkdoactivity');
    }

    public function test_look_think_do_activity_page_status_200()
    {
        $ltd = \App\Models\LookThinkDo::list();
        $first = collect($ltd['data'] ?? [])->first();
        $slug = $first['slug'] ?? null;
        if (!$slug) {
            $this->markTestSkipped('No LookThinkDo activity slug found in live data.');
        }
        $response = $this->get(route('ltd-activity', ['slug' => $slug]));
        $response->assertViewIs('learning.lookthinkdoactivity');
    }


    public function test_look_think_do_activity_returns_404()
    {
         Mockery::mock('alias:' . searchController::class)
            ->shouldReceive('injectResults')
            ->andReturnNull();
        $controller = new learningController();
        $response = $this->get(route('ltd-activity', ['slug' => 'nothing-here']));
        $this->assertEquals(404, $response->status());
    }

    // Resources
    public function test_resources_returns_view()
    {
        $response = $this->get(route('learn-with-us-resources'));
        $response->assertViewIs('learning.resources');
    }

    public function test_resources_returns_status_200()
    {
        $response = $this->get(route('learn-with-us-resources'));
        $response->assertStatus(200);
    }

    // Resource
    public function test_resource_returns_view()
    {
        $resources = \App\Models\LearningPages::filterByResource('Fact Sheets');
        $first = collect($resources['data'] ?? [])->first();
        $slug = $first['slug'] ?? null;
        if (!$slug) {
            $this->markTestSkipped('No resource slug found in live data.');
        }
        $response = $this->get(route('learn-with-us-resource', ['slug' => $slug]));
        $response->assertViewIs('learning.resource');
    }

    public function test_resource_returns_404()
    {
         Mockery::mock('alias:' . searchController::class)
            ->shouldReceive('injectResults')
            ->andReturnNull();
        $response = $this->get(route('learn-with-us-resource', ['slug' => 'nothing-here']));
        $this->assertEquals(404, $response->status());
    }

    // Static Methods
    public function test_schoolsessions_returns_array()
    {
        $this->assertIsArray(learningController::schoolsessions());
    }

    public function test_families_returns_array()
    {
        $this->assertIsArray(learningController::families());
    }

    public function test_gallery_activities_returns_array()
    {
        $this->assertIsArray(learningController::galleryActivities());
    }

    public function test_youngpeople_returns_array()
    {
        $this->assertIsArray(learningController::youngpeople());
    }

    public function test_adultsessions_returns_array()
    {
        $this->assertIsArray(learningController::adultsessions());
    }

    public function test_communitysessions_returns_array()
    {
        $this->assertIsArray(learningController::communitysessions());
    }

    public function test_research_returns_array()
    {
        $this->assertIsArray(learningController::research());
    }

    // Adult
    public function test_adult_returns_view()
    {
        $adults = \App\Models\Stubs::findBySubSection('adult-programming');
        $first = collect($adults['data'] ?? [])->first();
        $slug = $first['slug'] ?? null;
        if (!$slug) {
            $this->markTestSkipped('No adult session slug found in live data.');
        }
        $response = $this->get(route('adult-activity', ['slug' => $slug]));
        $response->assertViewIs('learning.adult');
    }

    public function test_adult_returns_status_200()
    {
        $adults = \App\Models\Stubs::findBySubSection('adult-programming');
        $first = collect($adults['data'] ?? [])->first();
        $slug = $first['slug'] ?? null;
        if (!$slug) {
            $this->markTestSkipped('No adult session slug found in live data.');
        }
        $response = $this->get(route('adult-activity', ['slug' => $slug]));
        $response->assertStatus(200);
    }

    public function test_adult_returns_404()
    {
         Mockery::mock('alias:' . searchController::class)
            ->shouldReceive('injectResults')
            ->andReturnNull();
        $response = $this->get(route('adult-activity', ['slug' => 'nothing-here']));
        $this->assertEquals(404, $response->status());
    }

    public function test_school_session_returns_view()
    {
        $sessions = \App\Models\SchoolSessions::list();
        $first = collect($sessions['data'] ?? [])->first();
        $slug = $first['slug'] ?? null;
        if (!$slug) {
            $this->markTestSkipped('No school session slug found in live data.');
        }
        $response = $this->get(route('school-sessions', ['slug' => $slug]));
        $response->assertViewIs('learning.session');
    }

    public function test_school_session_returns_404()
    {
         Mockery::mock('alias:' . searchController::class)
            ->shouldReceive('injectResults')
            ->andReturnNull();
        $response = $this->get(route('school-sessions', ['slug' => 'non-existent-slug']));
        $this->assertEquals(404, $response->status());
    }

    // Community
    public function test_community_returns_view()
    {
        $community = \App\Models\Stubs::findBySubSection('community-programming');
        $first = collect($community['data'] ?? [])->first();
        $slug = $first['slug'] ?? null;
        if (!$slug) {
            $this->markTestSkipped('No community session slug found in live data.');
        }
        $response = $this->get(route('community-programming', ['slug' => $slug]));
        $response->assertViewIs('learning.community');
    }

    public function test_community_returns_404()
    {
         Mockery::mock('alias:' . searchController::class)
            ->shouldReceive('injectResults')
            ->andReturnNull();
        $response = $this->get(route('community-programming', ['slug' => 'nothing-here']));
        $this->assertEquals(404, $response->status());
    }

    // Young
    public function test_young_returns_view()
    {
        $young = \App\Models\Stubs::findBySubSection('young-people');
        $first = collect($young['data'] ?? [])->first();
        $slug = $first['slug'] ?? null;
        if (!$slug) {
            $this->markTestSkipped('No young session slug found in live data.');
        }
        $response = $this->get(route('young-people', ['slug' => $slug]));
        $response->assertViewIs('learning.young');
    }

    public function test_young_returns_404()
    {
         Mockery::mock('alias:' . searchController::class)
            ->shouldReceive('injectResults')
            ->andReturnNull();
        $response = $this->get(route('young-people', ['slug' => 'non-existent-slug']));
        $this->assertEquals(404, $response->status());
    }

    // Profiles
    public function test_profiles_returns_view()
    {
        $response = $this->get(route('learn-with-us-profiles'));
        $response->assertViewIs('learning.profiles');
    }
}
