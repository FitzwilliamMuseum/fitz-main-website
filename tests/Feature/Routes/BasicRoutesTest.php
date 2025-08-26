<?php

namespace Tests\Feature\Routes;

use Tests\TestCase;
use PHPUnit\Framework\Attributes\RunTestsInSeparateProcesses;
use PHPUnit\Framework\Attributes\PreserveGlobalState;

#[RunTestsInSeparateProcesses]
#[PreserveGlobalState(false)] 
class BasicRoutesTest extends TestCase
{
    /**
     * Test that basic routes are accessible and don't throw 500 errors
     */
    public function test_basic_routes_accessibility()
    {
        $basicRoutes = [
            route('home') => 'home page',
            route('directors') => 'directors page',
            route('research') => 'research page',
            route('galleries') => 'galleries page',
            route('exhibitions') => 'exhibitions page',
            route('news') => 'news page',
            route('collections') => 'collection landing page',
            route('highlights') => 'highlights page',
            route('conversations') => 'conversations page',
            // route('events.index') => 'events page',
            route('search.index') => 'search page',
        ];

        foreach ($basicRoutes as $route => $description) {
            $response = $this->get($route);
            
            // Should not be a server error
            $this->assertNotEquals(500, $response->getStatusCode(), 
                "Route {$route} ({$description}) should not return server error");
                
            // Should be successful or a client error (like 404 for missing content)
            $this->assertContains($response->getStatusCode(), [200, 404], 
                "Route {$route} ({$description}) should return 200 or 404, got {$response->getStatusCode()}");
        }
    }

    /**
     * Test redirects work correctly
     */
    public function test_redirects()
    {
        $redirects = [
            '/galleries' => 'plan-your-visit/galleries',
            '/exhibitions' => 'plan-your-visit/exhibitions',
            '/plan-your-visit/exhibitions/archive' => 'plan-your-visit/past-exhibitions-and-displays'
        ];

        foreach ($redirects as $from => $to) {
            $response = $this->get($from);
            $this->assertEquals(302, $response->getStatusCode(), "Route {$from} should redirect");
            $response->assertRedirect($to);
        }
    }

    /**
     * Test routes that require parameters return appropriate errors for missing params
     */
    public function test_parameterized_routes_with_test_data()
    {
        $parameterizedRoutes = [
            route('director', ['slug' => 'test-director']),
            route('collection', ['slug' => 'test-collection']),
            route('department', ['slug' => 'test-department']),
            route('research-project', ['slug' => 'test-project']),
            route('gallery', ['slug' => 'test-gallery']),
            route('exhibition', ['slug' => 'test-exhibition']),
            route('article', ['slug' => 'test-article']),
        ];

        foreach ($parameterizedRoutes as $route) {
            $response = $this->get($route);
            
            // Should not be a server error - either works or content not found
            $this->assertNotEquals(500, $response->getStatusCode(), 
                "Route {$route} should not return server error");
                
            $this->assertContains($response->getStatusCode(), [200, 404], 
                "Route {$route} should return 200 or 404, got {$response->getStatusCode()}");
        }
    }

    /**
     * Test POST routes accept POST requests
     */
    public function test_post_routes()
    {
        $postRoutes = [
            route('highlight-search'),
            route('search.results'),
            route('tessitura.search')
        ];

        foreach ($postRoutes as $route) {
            $response = $this->post($route);
            
            // Should not be method not allowed or server error
            $this->assertNotEquals(405, $response->getStatusCode(), 
                "Route {$route} should accept POST method");
            $this->assertNotEquals(500, $response->getStatusCode(), 
                "Route {$route} should not return server error");
                
            // Accept various valid responses (success, redirect, validation error)
            $this->assertContains($response->getStatusCode(), [200, 302, 422], 
                "Route {$route} should return valid response code, got {$response->getStatusCode()}");
        }
    }

    /**
     * Test that protected routes require authentication
     */
    public function test_protected_routes()
    {
        $response = $this->get('/clear-cache');
        
        // Should require authentication - expect 401 unauthorized or 302 redirect
        $this->assertContains($response->getStatusCode(), [401, 302], 
            "Cache clear route should require authentication");
    }

    /**
     * Test True to Nature exhibition routes (if they exist)
     */
    public function test_true_to_nature_routes()
    {
        $ttnRoutes = [
            '/plan-your-visit/exhibitions/true-to-nature-open-air-painting-in-europe-1780-1870/artists',
            '/plan-your-visit/exhibitions/true-to-nature-open-air-painting-in-europe-1780-1870/labels',
            '/plan-your-visit/exhibitions/true-to-nature-open-air-painting-in-europe-1780-1870/geojson',
            '/plan-your-visit/exhibitions/true-to-nature-open-air-painting-in-europe-1780-1870/mapped',
            '/plan-your-visit/exhibitions/true-to-nature-open-air-painting-in-europe-1780-1870/viewpoints',
        ];

        foreach ($ttnRoutes as $route) {
            $response = $this->get($route);
            
            // Should not be a server error
            $this->assertNotEquals(500, $response->getStatusCode(), 
                "TTN route {$route} should not return server error");
                
            // These are specific exhibition routes, so they might not exist (404) or work (200)
            $this->assertContains($response->getStatusCode(), [200, 404], 
                "TTN route {$route} should return 200 or 404, got {$response->getStatusCode()}");
        }
    }

    /**
     * Test catch-all routes
     */
    public function test_catch_all_routes()
    {
        $catchAllRoutes = [
            '/test-section',
            '/test-section/test-page/'
        ];

        foreach ($catchAllRoutes as $route) {
            $response = $this->get($route);
            
            // Catch-all routes should not cause server errors
            $this->assertNotEquals(500, $response->getStatusCode(), 
                "Catch-all route {$route} should not return server error");
        }
    }

    /**
     * Test that feeds route doesn't cause errors
     */
    public function test_feeds_route()
    {
        // Test common feed URLs that might be generated by Route::feeds()
        $feedRoutes = ['/feeds', '/feed', '/rss', '/atom'];
        
        foreach ($feedRoutes as $route) {
            $response = $this->get($route);
            
            // Should not be a server error
            $this->assertNotEquals(500, $response->getStatusCode(), 
                "Feed route {$route} should not return server error");
        }
    }

    /**
     * Test HTTP methods are properly restricted
     */
    public function test_method_restrictions()
    {
        // Test that GET-only routes reject other methods
        $response = $this->put(route('directors'));
        $this->assertEquals(405, $response->getStatusCode(), 
            'GET-only routes should return 405 for other methods');

        $response = $this->delete(route('research'));
        $this->assertEquals(405, $response->getStatusCode(), 
            'GET-only routes should return 405 for DELETE method');

        $response = $this->patch(route('news'));
        $this->assertEquals(405, $response->getStatusCode(), 
            'GET-only routes should return 405 for PATCH method');
    }
}
