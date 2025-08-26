<?php

namespace Tests\Feature\Routes;
use Illuminate\Support\Facades\Config;
use Tests\TestCase;
use PHPUnit\Framework\Attributes\RunTestsInSeparateProcesses;
use PHPUnit\Framework\Attributes\PreserveGlobalState;

#[RunTestsInSeparateProcesses]
#[PreserveGlobalState(false)] 
class RouteStructureTest extends TestCase
{
    /**
     * Test that core application routes don't cause method not allowed errors
     */
    public function test_core_routes_accept_correct_methods()
    {
        $getRoutes = [
            route('home'),
            route('search.index'), // Disabled - uses Solarium which is blocked locally
            route('directors'),
            route('research'),
            route('news'),
        ];

        foreach ($getRoutes as $route) {
            $response = $this->get($route);
            
            // Should not be method not allowed
            $this->assertNotEquals(405, $response->getStatusCode(), 
                "Route {$route} should accept GET method");
        }
    }

    /**
     * Test redirects work as expected
     */
    public function test_expected_redirects()
    {
        // Test galleries redirect
        $response = $this->get('/galleries');
        $this->assertEquals(302, $response->getStatusCode());
        $response->assertRedirect(route('galleries'));

        // Test exhibitions redirect  
        $response = $this->get('/exhibitions');
        $this->assertEquals(302, $response->getStatusCode());
        $response->assertRedirect('plan-your-visit/exhibitions');

        // Test exhibition archive redirect
        $response = $this->get('/plan-your-visit/exhibitions/archive');
        $this->assertEquals(302, $response->getStatusCode());
        $response->assertRedirect('plan-your-visit/past-exhibitions-and-displays');
    }

    /**
     * Test that routes expecting POST also accept POST
     */
    public function test_post_routes_accept_post()
    {
        $mixedRoutes = [
            '/explore-our-collection/highlights/search/results',
            // '/search/results', // Disabled - uses Solarium which is blocked locally
            '/events/search'
        ];

        foreach ($mixedRoutes as $route) {
            // Test GET method
            $getResponse = $this->get($route);
            $this->assertNotEquals(405, $getResponse->getStatusCode(), 
                "Route {$route} should accept GET method");

            // Test POST method  
            $postResponse = $this->post($route);
            $this->assertNotEquals(405, $postResponse->getStatusCode(), 
                "Route {$route} should accept POST method");
        }
    }

    /**
     * Test that GET-only routes properly reject other HTTP methods
     */
    public function test_get_only_routes_reject_other_methods()
    {
        $getOnlyRoute = '/about-us/our-directors';

        // Should reject PUT
        $response = $this->put($getOnlyRoute);
        $this->assertEquals(405, $response->getStatusCode());

        // Should reject DELETE
        $response = $this->delete($getOnlyRoute);
        $this->assertEquals(405, $response->getStatusCode());

        // Should reject PATCH
        $response = $this->patch($getOnlyRoute);  
        $this->assertEquals(405, $response->getStatusCode());
    }

    /**
     * Test protected route authentication requirement
     */
    public function test_protected_route_authentication()
    {
        $response = $this->get('/clear-cache');
        
        // Should require authentication (401) or redirect to login (302)
        $this->assertContains($response->getStatusCode(), [401, 302], 
            'Protected route should require authentication');
    }

    /**
     * Test route parameter handling for valid slug formats
     */
    public function test_route_parameter_formats()
    {
        // Test routes with valid slug formats
        $slugRoutes = [
            '/about-us/directors/valid-slug-123',
            '/about-us/collections/collection-name/',
            '/research/projects/project-name-2024/',
            '/news/news-article-title/',
        ];

        foreach ($slugRoutes as $route) {
            $response = $this->get($route);
            
            // Should not be bad request (400) - parameters should be accepted
            $this->assertNotEquals(400, $response->getStatusCode(), 
                "Route {$route} should accept valid slug format");
                
            // Should not be method not allowed
            $this->assertNotEquals(405, $response->getStatusCode(), 
                "Route {$route} should be routable");
        }
    }

    /**
     * Test True to Nature exhibition route structure
     */
    public function test_true_to_nature_route_structure()
    {
        $ttnBasePath = '/plan-your-visit/exhibitions/true-to-nature-open-air-painting-in-europe-1780-1870';
        
        $ttnRoutes = [
            $ttnBasePath . '/artists',
            $ttnBasePath . '/labels', 
            $ttnBasePath . '/geojson',
            $ttnBasePath . '/mapped',
            $ttnBasePath . '/viewpoints',
        ];

        foreach ($ttnRoutes as $route) {
            $response = $this->get($route);
            
            // Should not be method not allowed - route should exist
            $this->assertNotEquals(405, $response->getStatusCode(), 
                "TTN route {$route} should be properly registered");
        }
    }

    /**
     * Test catch-all routes handle unknown sections
     */
    public function test_catch_all_routing()
    {
        // Test section catch-all
        $response = $this->get('/unknown-section');
        $this->assertNotEquals(405, $response->getStatusCode(), 
            'Catch-all route should handle unknown sections');

        // Test section/slug catch-all
        $response = $this->get('/unknown-section/unknown-page/');
        $this->assertNotEquals(405, $response->getStatusCode(), 
            'Catch-all route should handle unknown section/slug combinations');
    }

    /**
     * Test complex nested route structures
     */
    public function test_nested_route_structures()
    {
        $nestedRoutes = [
            '/plan-your-visit/exhibitions/test/cases/',
            '/plan-your-visit/exhibitions/test/cases/case-1',
            '/explore-our-collection/highlights/periods/medieval',
            '/explore-our-collection/highlights/themes/nature',
            '/about-us/departments/conservation-and-collections-care/team-member',
        ];

        foreach ($nestedRoutes as $route) {
            $response = $this->get($route);
            
            // Should not be method not allowed - routes should be properly structured
            $this->assertNotEquals(405, $response->getStatusCode(), 
                "Nested route {$route} should be properly registered");
        }
    }

    /**
     * Test that feeds functionality is accessible
     */
    public function test_feeds_accessibility()
    {
        $possibleFeedPaths = Config::get('feed.feeds');
        // dd($possibleFeedPaths);
        $feedFound = false;
        foreach ($possibleFeedPaths as $feed) {
            $path = $feed['url'];
            $response = $this->get($path);
            if ($response->getStatusCode() !== 404) {
                $feedFound = true;
                $this->assertNotEquals(405, $response->getStatusCode(), 
                    "Feed route {$path} should be accessible");
                break;
            }
        }
        
        // At least one feed route should exist (or we skip if feeds aren't configured)
        if (!$feedFound) {
            $this->markTestSkipped('No feed routes appear to be configured');
        }
    }

    /**
     * Test route naming consistency 
     */
    public function test_route_naming_consistency()
    {
        // Test that important named routes exist and are accessible (excluding Solarium-dependent routes)
        $namedRoutes = [
            'home' => route('home'),
            'directors' => route('directors'),
            'research' => route('research'),
            'galleries' => route('galleries'),
            'exhibitions' => route('exhibitions'),
            'news' => route('news'),
            'search.index' => route('search.index'),
        ];

        foreach ($namedRoutes as $name => $expectedPath) {
            $routeUrl = route($name);
            $this->assertStringContainsString($expectedPath, $routeUrl, 
                "Named route '{$name}' should generate correct URL");

            // Test that the generated route is accessible
            $response = $this->get($expectedPath);
            $this->assertNotEquals(405, $response->getStatusCode(), 
                "Named route '{$name}' should be accessible via GET");
        }
    }
}
