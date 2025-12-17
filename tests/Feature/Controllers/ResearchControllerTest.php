<?php

namespace Tests\Feature\Controllers;

use Mockery;
use Tests\TestCase;
use PHPUnit\Framework\Attributes\Test;
use App\Http\Controllers\searchController;

class ResearchControllerTest extends TestCase
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

    #[Test]
    public function index_route_returns_200()
    {
        $response = $this->get(route('research'));
        $response->assertStatus(200);
    }

    #[Test]
    public function index_route_renders_correct_view()
    {
        $response = $this->get(route('research'));
        $response->assertViewIs('research.index');
    }

    #[Test]
    public function index_route_has_expected_view_data()
    {
        $response = $this->get(route('research'));
        $response->assertViewHasAll(['pages', 'associated']);
    }

    #[Test]
    public function projects_route_returns_200()
    {
        $response = $this->get(route('research-projects'));
        $response->assertStatus(200);
    }

    #[Test]
    public function projects_route_renders_correct_view()
    {
        $response = $this->get(route('research-projects'));
        $response->assertViewIs('research.projects');
    }

    #[Test]
    public function projects_route_has_projects_data()
    {
        $response = $this->get(route('research-projects'));
        $response->assertViewHas('projects');
    }

    #[Test]
    public function project_route_returns_200_or_404()
    {
        $projects = \App\Models\ResearchProjects::list(request());
        $project = $projects->items()['data'][0] ?? null;

        if ($project && !empty($project['slug'])) {
            $response = $this->get(route('research-project', ['slug' => $project['slug']]));
            $this->assertTrue(in_array($response->getStatusCode(), [200, 404]));
        } else {
            Mockery::mock('alias:' . searchController::class)
                ->shouldReceive('injectResults')
                ->andReturn([]);
            $response = $this->get(route('research-project', ['slug' => 'nemo']));
            $response->assertStatus(404);
            Mockery::close();
        }
    }

    #[Test]
    public function project_route_renders_project_view_on_200()
    {
        $projects = \App\Models\ResearchProjects::list(request());
        $project = $projects->items()['data'][0] ?? null;

        if ($project && !empty($project['slug'])) {
            $response = $this->get(route('research-project', ['slug' => $project['slug']]));
            if ($response->getStatusCode() === 200) {
                $response->assertViewIs('research.project');
            }
        }
    }

    #[Test]
    public function project_route_has_project_and_records_on_200()
    {
        $projects = \App\Models\ResearchProjects::list(request());
        $project = $projects->items()['data'][0] ?? null;

        if ($project && !empty($project['slug'])) {
            $response = $this->get(route('research-project', ['slug' => $project['slug']]));
            if ($response->getStatusCode() === 200) {
                $response->assertViewHas('project');
                $response->assertViewHas('records');
            }
        }
    }

    #[Test]
    public function profiles_route_returns_200()
    {
        $response = $this->get(route('research-profiles'));
        $response->assertStatus(200);
    }

    #[Test]
    public function profiles_route_renders_correct_view()
    {
        $response = $this->get(route('research-profiles'));
        $response->assertViewIs('research.profiles');
    }

    #[Test]
    public function profiles_route_has_profiles_data()
    {
        $response = $this->get(route('research-profiles'));
        $response->assertViewHas('profiles');
    }

    #[Test]
    public function profile_route_returns_200_or_404()
    {
        $profiles = \App\Models\StaffProfiles::list(request());
        $profile = $profiles['data'][0] ?? null;

        if ($profile && !empty($profile['slug'])) {
            $response = $this->get(route('research-profile', ['slug' => $profile['slug']]));
            $this->assertTrue(in_array($response->getStatusCode(), [200, 404]));
        } else {
            Mockery::mock('alias:' . searchController::class)
                ->shouldReceive('injectResults')
                ->andReturnNull();
            $response = $this->get(route('research-profile', ['slug' => 'invalid-slug-12345']));
            $response->assertStatus(404);
            $response->assertViewIs('errors.404');
            Mockery::close();
        }
    }

    #[Test]
    public function profile_route_renders_profile_view_on_200()
    {
        $profiles = \App\Models\StaffProfiles::list(request());
        $profile = $profiles['data'][0] ?? null;

        if ($profile && !empty($profile['slug'])) {
            $response = $this->get(route('research-profile', ['slug' => $profile['slug']]));
            if ($response->getStatusCode() === 200) {
                $response->assertViewIs('research.profile');
            }
        }
    }

    #[Test]
    public function profile_route_has_profile_and_similar_on_200()
    {
        $profiles = \App\Models\StaffProfiles::list(request());
        $profile = $profiles['data'][0] ?? null;

        if ($profile && !empty($profile['slug'])) {
            $response = $this->get(route('research-profile', ['slug' => $profile['slug']]));
            if ($response->getStatusCode() === 200) {
                $response->assertViewHas('profile');
                $response->assertViewHas('similar');
            }
        }
    }

    #[Test]
    public function affiliates_route_returns_200()
    {
        $response = $this->get(route('research-affiliates'));
        $response->assertStatus(200);
    }

    #[Test]
    public function affiliates_route_renders_correct_view()
    {
        $response = $this->get(route('research-affiliates'));
        $response->assertViewIs('research.affiliates');
    }

    #[Test]
    public function affiliates_route_has_profiles_data()
    {
        $response = $this->get(route('research-affiliates'));
        $response->assertViewHas('profiles');
    }

    #[Test]
    public function affiliated_researcher_route_returns_200_or_404()
    {
        $affiliates = \App\Models\AffiliateResearchers::list();
        $affiliate = $affiliates['data'][0] ?? null;
        if ($affiliate && !empty($affiliate['slug'])) {
            $response = $this->get(route('research-affiliate', ['slug' => $affiliate['slug']]));
            $this->assertTrue(in_array($response->getStatusCode(), [200, 404]));
        } else {
            Mockery::mock('alias:' . searchController::class)
                ->shouldReceive('injectResults')
                ->andReturn([]);
            $response = $this->get(route('research-affiliate', ['slug' => 'invalid-slug-12345']));
            $response->assertStatus(404);
            $response->assertViewIs('errors.404');
            Mockery::close();
        }
    }

    #[Test]
    public function affiliated_researcher_route_renders_affiliate_view_on_200()
    {
        $affiliates = \App\Models\AffiliateResearchers::list();
        $affiliate = $affiliates['data'][0] ?? null;
        if ($affiliate && !empty($affiliate['slug'])) {
            $response = $this->get(route('research-affiliate', ['slug' => $affiliate['slug']]));
            if ($response->getStatusCode() === 200) {
                $response->assertViewIs('research.affiliate');
            }
        }
    }

    #[Test]
    public function affiliated_researcher_route_has_profile_on_200()
    {
        $affiliates = \App\Models\AffiliateResearchers::list();
        $affiliate = $affiliates['data'][0] ?? null;
        if ($affiliate && !empty($affiliate['slug'])) {
            $response = $this->get(route('research-affiliate', ['slug' => $affiliate['slug']]));
            if ($response->getStatusCode() === 200) {
                $response->assertViewHas('profile');
            }
        }
    }

    #[Test]
    public function resources_route_returns_200()
    {
        $response = $this->get(route('resources'));
        $response->assertStatus(200);
    }

    #[Test]
    public function resources_route_renders_correct_view()
    {
        $response = $this->get(route('resources'));
        $response->assertViewIs('research.resources');
    }

    #[Test]
    public function resources_route_has_resources_data()
    {
        $response = $this->get(route('resources'));
        $response->assertViewHas('resources');
    }

    #[Test]
    public function resource_route_returns_200_or_404()
    {
        $resources = \App\Models\OnlineResources::list(request());
        $resource = $resources['data'][0] ?? null;
        if ($resource && !empty($resource['slug'])) {
            $response = $this->get(route('resource', ['slug' => $resource['slug']]));
            $this->assertTrue(in_array($response->getStatusCode(), [200, 404]));
        } else {
            $response = $this->get(route('resource', ['slug' => 'invalid-slug-12345']));
            $response->assertStatus(404);
            $response->assertViewIs('errors.404');
        }
    }

    #[Test]
    public function resource_route_renders_resource_view_on_200()
    {
        $resources = \App\Models\OnlineResources::list(request());
        $resource = $resources['data'][0] ?? null;
        if ($resource && !empty($resource['slug'])) {
            $response = $this->get(route('resource', ['slug' => $resource['slug']]));
            if ($response->getStatusCode() === 200) {
                $response->assertViewIs('research.resource');
            }
        }
    }

    #[Test]
    public function resource_route_has_resources_on_200()
    {
        $resources = \App\Models\OnlineResources::list(request());
        $resource = $resources['data'][0] ?? null;
        if ($resource && !empty($resource['slug'])) {
            $response = $this->get(route('resource', ['slug' => $resource['slug']]));
            if ($response->getStatusCode() === 200) {
                $response->assertViewHas('resources');
            }
        }
    }

    #[Test]
    public function opportunities_route_returns_200()
    {
        $response = $this->get(route('opportunities'));
        $response->assertStatus(200);
    }

    #[Test]
    public function opportunities_route_renders_correct_view()
    {
        $response = $this->get(route('opportunities'));
        $response->assertViewIs('research.opportunities');
    }

    #[Test]
    public function opportunities_route_has_opportunities_data()
    {
        $response = $this->get(route('opportunities'));
        $response->assertViewHas('opportunities');
    }

    #[Test]
    public function opportunity_route_returns_200_or_404()
    {
        $opportunities = \App\Models\ResearchOpportunities::list();
        $opportunity = $opportunities['data'][0] ?? null;
        if ($opportunity && !empty($opportunity['slug'])) {
            $response = $this->get(route('opportunity', ['slug' => $opportunity['slug']]));
            $this->assertTrue(in_array($response->getStatusCode(), [200, 404]));
        } else {
            Mockery::mock('alias:' . searchController::class)
                ->shouldReceive('injectResults')
                ->andReturn([]);
            $response = $this->get(route('opportunity', ['slug' => 'invalid-slug-12345']));
            $response->assertStatus(404);
            $response->assertViewIs('errors.404');
            Mockery::close();
        }
    }

    #[Test]
    public function opportunity_route_renders_opportunity_view_on_200()
    {
        $opportunities = \App\Models\ResearchOpportunities::list();
        $opportunity = $opportunities['data'][0] ?? null;
        if ($opportunity && !empty($opportunity['slug'])) {
            $response = $this->get(route('opportunity', ['slug' => $opportunity['slug']]));
            if ($response->getStatusCode() === 200) {
                $response->assertViewIs('research.opportunity');
            }
        }
    }

    #[Test]
    public function opportunity_route_has_opportunity_on_200()
    {
        $opportunities = \App\Models\ResearchOpportunities::list();
        $opportunity = $opportunities['data'][0] ?? null;
        if ($opportunity && !empty($opportunity['slug'])) {
            $response = $this->get(route('opportunity', ['slug' => $opportunity['slug']]));
            if ($response->getStatusCode() === 200) {
                $response->assertViewHas('opportunity');
            }
        }
    }

    #[Test]
    public function external_curators_route_returns_200()
    {
        $response = $this->get(route('exhibition-externals-list'));
        $response->assertStatus(200);
    }

    #[Test]
    public function external_curators_route_renders_correct_view()
    {
        $response = $this->get(route('exhibition-externals-list'));
        $response->assertViewIs('research.external-curators');
    }

    #[Test]
    public function external_curators_route_has_curators_data()
    {
        $response = $this->get(route('exhibition-externals-list'));
        $response->assertViewHas('curators');
    }
}
