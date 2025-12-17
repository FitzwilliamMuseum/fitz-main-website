<?php

namespace Tests\Feature\Controllers;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Str;
use Tests\TestCase;
use App\Models\Stubs;
use App\Models\Subpages;
use App\Models\Faqs;
use App\Models\GroupVisits;
use Mockery;
use App\Http\Controllers\searchController;
use PHPUnit\Framework\Attributes\RunTestsInSeparateProcesses;
use PHPUnit\Framework\Attributes\PreserveGlobalState;

#[RunTestsInSeparateProcesses]
#[PreserveGlobalState(false)]
class VisitControllerTest extends TestCase
{
    use RefreshDatabase;

    protected function tearDown(): void
    {
        Mockery::close();
        parent::tearDown();
    }
    
    ## Test the Visit Landing Page
    
    public function test_index_route_returns_ok_status()
    {
        $this->get(route('visit'))->assertStatus(200);
    }
    
    public function test_index_route_returns_correct_view()
    {
        $response = $this->get(route('visit'));
        $this->assertTrue(in_array($response->original->getName(), ['visit.index', 'visit.index-old']));
    }
    
    public function test_index_route_view_has_expected_data()
    {
        $response = $this->get(route('visit'));
        $response->assertViewHasAll(['current', 'displays', 'page']);
    }

    ## Test the FAQs Route

    public function test_faqs_route_returns_ok_status()
    {
        $this->markTestSkipped('The visit.faqs route is deprecated.');
        $this->get(route('visit.faqs'))->assertStatus(200);
    }

    public function test_faqs_route_returns_correct_view()
    {
        $this->markTestSkipped('The visit.faqs route is deprecated.');
        $this->get(route('visit.faqs'))->assertViewIs('visit.faqs');
    }

    public function test_faqs_route_view_has_expected_data()
    {
        $this->markTestSkipped('The visit.faqs route is deprecated.');
        $this->get(route('visit.faqs'))->assertViewHasAll(['visiting', 'hse', 'booking', 'records']);
    }
    
    ## Test a Valid Subpage

    public function test_get_subpage_route_with_valid_slug_returns_ok_status()
    {
        $subpageData = Subpages::getSubpage('become-a-friend');
        $slug = $subpageData['data'][0]['slug'] ?? null;

        if (!$slug) {
            $this->markTestSkipped('No subpages found in the database for slug become-a-friend.');
        }

        $response = $this->get(route('visit-subpage', ['slug' => $slug]));
        $response->assertStatus(200);
    }

    public function test_get_subpage_route_with_valid_slug_returns_correct_view()
    {
        $subpageData = Subpages::getSubpage('become-a-friend');
        $slug = $subpageData['data'][0]['slug'] ?? null;

        if (!$slug) {
            $this->markTestSkipped('No subpages found in the database for slug become-a-friend.');
        }

        $response = $this->get(route('visit-subpage', ['slug' => $slug]));
        $response->assertViewIs('support.subpage');
    }

    public function test_get_subpage_route_with_valid_slug_view_has_expected_data()
    {
        $subpageData = Subpages::getSubpage('become-a-friend');
        $slug = $subpageData['data'][0]['slug'] ?? null;

        if (!$slug) {
            $this->markTestSkipped('No subpages found in the database for slug become-a-friend.');
        }

        $response = $this->get(route('visit-subpage', ['slug' => $slug]));
        $response->assertViewHasAll(['page', 'parent_page']);
    }


}