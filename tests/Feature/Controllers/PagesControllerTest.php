<?php

namespace Tests\Feature\Controllers;

use Mockery;
use App\Models\Stubs;
use App\Models\FindMoreLikeThis;
use App\Models\Promopage;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Http\Controllers\searchController;

class PagesControllerTest extends TestCase
{
    use RefreshDatabase, WithFaker;

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


    public function test_index_route_returns_ok()
    {
        $testSection = 'commercial-services';
        $testSlug = 'venue-hire';
        $pageData = Stubs::getPage($testSection, $testSlug);
        $records = FindMoreLikeThis::find($testSlug, 'pages');
        if (empty($pageData['data']) || empty($records)) {
            $this->markTestSkipped('No live data available.');
        }
        $response = $this->get(route('landing-section', ['section' => $testSection, 'slug' => $testSlug]));
        $response->assertOk();
    }

    public function test_index_route_renders_correct_view()
    {
        $testSection = 'commercial-services';
        $testSlug = 'venue-hire';
        $pageData = Stubs::getPage($testSection, $testSlug);
        $records = FindMoreLikeThis::find($testSlug, 'pages');

        if (empty($pageData['data']) || empty($records)) {
            $this->markTestSkipped('No live data available.');
        }

        $response = $this->get(route('landing-section', ['section' => $testSection, 'slug' => $testSlug]));
        $response->assertViewIs('pages.index');
    }

    public function test_index_route_has_page_and_records()
    {
        $testSection = 'commercial-services';
        $testSlug = 'venue-hire';
        $pageData = Stubs::getPage($testSection, $testSlug);
        $records = FindMoreLikeThis::find($testSlug, 'pages');

        if (empty($pageData['data']) || empty($records)) {
            $this->markTestSkipped('No live data available.');
        }

        $response = $this->get(route('landing-section', ['section' => $testSection, 'slug' => $testSlug]));
        $response->assertViewHas('page');
        $response->assertViewHas('records');
    }

    public function test_index_route_page_data_is_correct()
    {
        $testSection = 'commercial-services';
        $testSlug = 'venue-hire';
        $pageData = Stubs::getPage($testSection, $testSlug);
        $records = FindMoreLikeThis::find($testSlug, 'pages');

        if (empty($pageData['data']) || empty($records)) {
            $this->markTestSkipped('No live data available.');
        }

        $response = $this->get(route('landing-section', ['section' => $testSection, 'slug' => $testSlug]));
        $this->assertEquals(collect($pageData['data'])->first(), $response->viewData('page'));
    }

    public function test_index_route_records_data_is_correct()
    {
        $testSection = 'commercial-services';
        $testSlug = 'venue-hire';
        $pageData = Stubs::getPage($testSection, $testSlug);
        $records = FindMoreLikeThis::find($testSlug, 'pages');

        if (empty($pageData['data']) || empty($records)) {
            $this->markTestSkipped('No live data available.');
        }

        $response = $this->get(route('landing-section', ['section' => $testSection, 'slug' => $testSlug]));
        $this->assertEquals($records, $response->viewData('records'));
    }

    public function test_index_route_page_is_not_null()
    {
        $testSection = 'commercial-services';
        $testSlug = 'venue-hire';
        $pageData = Stubs::getPage($testSection, $testSlug);
        $records = FindMoreLikeThis::find($testSlug, 'pages');

        if (empty($pageData['data']) || empty($records)) {
            $this->markTestSkipped('No live data available.');
        }

        $response = $this->get(route('landing-section', ['section' => $testSection, 'slug' => $testSlug]));
        $this->assertNotNull($response->viewData('page'));
    }

    public function test_index_route_records_is_not_empty()
    {
        $testSection = 'commercial-services';
        $testSlug = 'venue-hire';
        $pageData = Stubs::getPage($testSection, $testSlug);
        $records = FindMoreLikeThis::find($testSlug, 'pages');

        if (empty($pageData['data']) || empty($records)) {
            $this->markTestSkipped('No live data available.');
        }

        $response = $this->get(route('landing-section', ['section' => $testSection, 'slug' => $testSlug]));
        $this->assertNotEmpty($response->viewData('records'));
    }


    public function test_landing_route_returns_ok()
    {
        $testSection = 'about-us';
        $pageData = Stubs::getLanding($testSection);
        $promoData = Promopage::getSubpage($testSection);

        if (empty($pageData['data']) && empty($promoData['data'])) {
            $this->markTestSkipped('No live data available.');
        }

        $response = $this->get(route('landing', ['section' => $testSection]));
        $response->assertStatus(200);
    }

    public function test_landing_route_renders_expected_view()
    {
        $testSection = 'about-us';
        $pageData = Stubs::getLanding($testSection);
        $promoData = Promopage::getSubpage($testSection);

        if (empty($pageData['data']) && empty($promoData['data'])) {
            $this->markTestSkipped('No live data available.');
        }

        $response = $this->get(route('landing', ['section' => $testSection]));
        $this->assertContains(
            $response->original->getName(),
            ['pages.landing', 'promopage.subpage'],
            'View is not one of the expected landing views.'
        );
    }

    public function test_landing_route_page_data_is_not_null()
    {
        $testSection = 'about-us';
        $pageData = Stubs::getLanding($testSection);
        $promoData = Promopage::getSubpage($testSection);

        if (empty($pageData['data']) && empty($promoData['data'])) {
            $this->markTestSkipped('No live data available.');
        }

        $response = $this->get(route('landing', ['section' => $testSection]));
        $this->assertNotNull($response->viewData('page'), 'Page data is missing.');
    }

 


    public function test_index_route_404_returns_not_found()
    {
        Mockery::mock('alias:' . searchController::class)
            ->shouldReceive('injectResults')
            ->andReturn([]);

        $response = $this->get(route('landing-section', ['section' => 'nonexistent', 'slug' => 'missing']));
        $response->assertNotFound();
        Mockery::close();
    }

    public function test_index_route_404_renders_404_view()
    {
        Mockery::mock('alias:' . searchController::class)
            ->shouldReceive('injectResults')
            ->andReturn([]);

        $response = $this->get(route('landing-section', ['section' => 'nonexistent', 'slug' => 'missing']));
        $response->assertViewIs('errors.404');
        Mockery::close();
    }

  

    public function test_landing_route_404_returns_not_found()
    {
        Mockery::mock('alias:' . searchController::class)
            ->shouldReceive('injectResults')
            ->andReturn([]);

        $response = $this->get(route('landing', ['section' => 'nonexistent']));
        $response->assertNotFound();
    }

    public function test_landing_route_404_renders_404_view()
    {
        Mockery::mock('alias:' . searchController::class)
            ->shouldReceive('injectResults')
            ->andReturn([]);

        $response = $this->get(route('landing', ['section' => 'nonexistent']));
        $response->assertViewIs('errors.404');
    }

  
}
