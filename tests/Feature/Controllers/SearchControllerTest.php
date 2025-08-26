<?php

namespace Tests\Feature\Controllers;

use App\Models\SolrSearch;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Config;
use Tests\TestCase;
use Mockery;
use PHPUnit\Framework\Attributes\RunTestsInSeparateProcesses;
use PHPUnit\Framework\Attributes\PreserveGlobalState;

#[RunTestsInSeparateProcesses]
#[PreserveGlobalState(false)] 
class SearchControllerTest extends TestCase
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

    public function test_index_route_returns_200()
    {
        if (!SolrSearch::isSolrEnabled()) {
            $this->markTestSkipped('Solr is not enabled.');
        }
        $response = $this->get(route('search.index'));
        $response->assertStatus(200);
    }

    public function test_index_route_renders_search_index_view()
    {
        if (!SolrSearch::isSolrEnabled()) {
            $this->markTestSkipped('Solr is not enabled.');
        }
        $response = $this->get(route('search.index'));
        $response->assertViewIs('search.index');
    }

    public function test_results_route_with_live_solr_returns_200()
    {
        if (!SolrSearch::isSolrEnabled()) {
            $this->markTestSkipped('Solr is not enabled.');
        }
        $query = 'museum';
        $response = $this->post(route('search.results'), ['query' => $query]);
        $response->assertStatus(200);
    }

    public function test_results_route_with_live_solr_renders_results_view()
    {
        if (!SolrSearch::isSolrEnabled()) {
            $this->markTestSkipped('Solr is not enabled.');
        }
        $query = 'museum';
        $response = $this->post(route('search.results'), ['query' => $query]);
        $response->assertViewIs('search.results');
    }

    public function test_results_route_with_live_solr_has_expected_view_data()
    {
        if (!SolrSearch::isSolrEnabled()) {
            $this->markTestSkipped('Solr is not enabled.');
        }
        $query = 'museum';
        $response = $this->post(route('search.results'), ['query' => $query]);
        $response->assertViewHas(['records', 'number', 'paginate', 'queryString']);
    }

    public function test_results_route_with_solr_disabled_returns_200()
    {
        Config::set('solarium.enabled', false);
        $response = $this->post(route('search.results'), ['query' => 'art']);
        $response->assertStatus(200);
    }

    public function test_results_route_with_solr_disabled_renders_results_view()
    {
        Config::set('solarium.enabled', false);
        $response = $this->post(route('search.results'), ['query' => 'art']);
        $response->assertViewIs('search.results');
    }

    public function test_results_route_validation_fails_for_short_query()
    {
        if (!SolrSearch::isSolrEnabled()) {
            $this->markTestSkipped('Solr is not enabled.');
        }
        $response = $this->post(route('search.results'), ['query' => 'a']);
        $response->assertSessionHasErrors('query');
    }

    public function test_ping_route_returns_200()
    {
        if (!SolrSearch::isSolrEnabled()) {
            $this->markTestSkipped('Solr is not enabled.');
        }
        $response = $this->get(route('ping'));
        $response->assertStatus(200);
    }

    public function test_ping_route_returns_ok()
    {
        if (!SolrSearch::isSolrEnabled()) {
            $this->markTestSkipped('Solr is not enabled.');
        }
        $response = $this->get(route('ping'));
        $response->assertSee('OK');
    }
}
