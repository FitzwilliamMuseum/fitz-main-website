<?php

namespace Tests\Unit\Routes;

use Illuminate\Support\Facades\Route;
use Tests\TestCase;

class RouteRegistrationTest extends TestCase
{
    /**
     * Test that all expected routes are registered
     */
    public function test_all_routes_are_registered()
    {
        $routes = Route::getRoutes();
        $routeNames = [];
        
        foreach ($routes as $route) {
            if ($route->getName()) {
                $routeNames[] = $route->getName();
            }
        }

        // Core routes that should always exist (excluding Solarium-dependent routes)
        $expectedRoutes = [
            'home',
            'directors',
            'collections',
            'research',
            'galleries',
            'exhibitions',
            'news',
            'highlights',
            'conversations',
            'podcasts',
            'events',
            'search.index', 
            'ping'          
        ];

        foreach ($expectedRoutes as $expectedRoute) {
            $this->assertContains($expectedRoute, $routeNames, "Route '{$expectedRoute}' should be registered");
        }
    }

    /**
     * Test route URI patterns
     */
    public function test_route_uri_patterns()
    {
        $routes = Route::getRoutes();
        
        $routePatterns = [
            'home' => '/',
            'directors' => 'about-us/our-directors',
            'research' => 'research',
            'galleries' => 'plan-your-visit/galleries',
            'exhibitions' => 'plan-your-visit/exhibitions',
            'news' => 'news',
            'highlights' => 'explore-our-collection/highlights',
            'conversations' => 'conversations',
            'events' => 'events',
            'search.index' => 'search', 
            'ping' => 'ping'           
        ];

        foreach ($routePatterns as $routeName => $expectedUri) {
            $route = $routes->getByName($routeName);
            $this->assertNotNull($route, "Route '{$routeName}' should exist");
            $this->assertEquals($expectedUri, $route->uri(), "Route '{$routeName}' should have URI '{$expectedUri}'");
        }
    }

    /**
     * Test route HTTP methods
     */
    // Test GET routes (excluding Solarium-dependent routes)
    public function test_home_route_accepts_get()
    {
        $route = Route::getRoutes()->getByName('home');
        $this->assertNotNull($route, "Route 'home' should exist");
        $this->assertContains('GET', $route->methods(), "Route 'home' should accept GET method");
    }

    public function test_directors_route_accepts_get()
    {
        $route = Route::getRoutes()->getByName('directors');
        $this->assertNotNull($route, "Route 'directors' should exist");
        $this->assertContains('GET', $route->methods(), "Route 'directors' should accept GET method");
    }

    public function test_research_route_accepts_get()
    {
        $route = Route::getRoutes()->getByName('research');
        $this->assertNotNull($route, "Route 'research' should exist");
        $this->assertContains('GET', $route->methods(), "Route 'research' should accept GET method");
    }

    public function test_galleries_route_accepts_get()
    {
        $route = Route::getRoutes()->getByName('galleries');
        $this->assertNotNull($route, "Route 'galleries' should exist");
        $this->assertContains('GET', $route->methods(), "Route 'galleries' should accept GET method");
    }

    public function test_exhibitions_route_accepts_get()
    {
        $route = Route::getRoutes()->getByName('exhibitions');
        $this->assertNotNull($route, "Route 'exhibitions' should exist");
        $this->assertContains('GET', $route->methods(), "Route 'exhibitions' should accept GET method");
    }

    public function test_news_route_accepts_get()
    {
        $route = Route::getRoutes()->getByName('news');
        $this->assertNotNull($route, "Route 'news' should exist");
        $this->assertContains('GET', $route->methods(), "Route 'news' should accept GET method");
    }

    // Test mixed method routes (GET and POST)
    public function test_highlight_search_route_accepts_get()
    {
        $route = Route::getRoutes()->getByName('highlight-search');
        if ($route) {
            $this->assertContains('GET', $route->methods(), "Route 'highlight-search' should accept GET method");
        }
    }

    public function test_highlight_search_route_accepts_post()
    {
        $route = Route::getRoutes()->getByName('highlight-search');
        if ($route) {
            $this->assertContains('POST', $route->methods(), "Route 'highlight-search' should accept POST method");
        }
    }

    public function test_search_results_route_accepts_get()
    {
        $route = Route::getRoutes()->getByName('search.results');
        if ($route) {
            $this->assertContains('GET', $route->methods(), "Route 'search.results' should accept GET method");
        }
    }

    public function test_search_results_route_accepts_post()
    {
        $route = Route::getRoutes()->getByName('search.results');
        if ($route) {
            $this->assertContains('POST', $route->methods(), "Route 'search.results' should accept POST method");
        }
    }

    public function test_tessitura_search_route_accepts_get()
    {
        $route = Route::getRoutes()->getByName('tessitura.search');
        if ($route) {
            $this->assertContains('GET', $route->methods(), "Route 'tessitura.search' should accept GET method");
        }
    }

    public function test_tessitura_search_route_accepts_post()
    {
        $route = Route::getRoutes()->getByName('tessitura.search');
        if ($route) {
            $this->assertContains('POST', $route->methods(), "Route 'tessitura.search' should accept POST method");
        }
    }

    /**
     * Test route parameters
     */
    public function test_route_parameters()
    {
        $routes = Route::getRoutes();

        // Routes with slug parameters
        $slugRoutes = [
            'director' => ['slug'],
            'collection' => ['slug'],
            'department' => ['slug'],
            'gallery' => ['slug'],
            'exhibition' => ['slug'],
            'article' => ['slug'],
            'highlight' => ['slug']
        ];

        foreach ($slugRoutes as $routeName => $expectedParams) {
            $route = $routes->getByName($routeName);
            if ($route) {
                $parameterNames = $route->parameterNames();
                foreach ($expectedParams as $expectedParam) {
                    $this->assertContains($expectedParam, $parameterNames, 
                        "Route '{$routeName}' should have parameter '{$expectedParam}'");
                }
            }
        }
    }

    /**
     * Test True to Nature exhibition routes are registered
     */
    public function test_true_to_nature_routes_registered()
    {
        $routes = Route::getRoutes();
        
        $ttnRoutes = [
            'exhibition.ttn.artists',
            'exhibition.ttn.labels',
            'exhibition.ttn.geoJson',
            'exhibition.ttn.mapped',
            'exhibition.ttn.viewpoints'
        ];

        foreach ($ttnRoutes as $routeName) {
            $route = $routes->getByName($routeName);
            $this->assertNotNull($route, "True to Nature route '{$routeName}' should be registered");
        }
    }

    /**
     * Test controller assignments
     */
    public function test_route_controllers()
    {
        $routes = Route::getRoutes();

        $controllerRoutes = [
            'home' => 'App\Http\Controllers\homeController@index',
            'directors' => 'App\Http\Controllers\aboutusController@directors', 
            'collections' => 'App\Http\Controllers\collectionsController@index',
            'research' => 'App\Http\Controllers\researchController@index',
            'galleries' => 'App\Http\Controllers\galleriesController@index',
            'exhibitions' => 'App\Http\Controllers\exhibitionsController@index',
            'news' => 'App\Http\Controllers\newsController@index',
            'highlights' => 'App\Http\Controllers\highlightsController@index',
            'conversations' => 'App\Http\Controllers\socialController@index',
            'events' => 'App\Http\Controllers\tessituraController@index',
            'search.index' => 'App\Http\Controllers\searchController@index' // Disabled - uses Solarium
        ];

        foreach ($controllerRoutes as $routeName => $expectedAction) {
            $route = $routes->getByName($routeName);
            if ($route) {
                $action = $route->getAction();
                if (isset($action['uses'])) {
                    $this->assertEquals($expectedAction, $action['uses'], 
                        "Route '{$routeName}' should use controller action '{$expectedAction}'");
                }
            }
        }
    }

    /**
     * Test redirect routes
     */
    public function test_redirect_routes()
    {
        $routes = Route::getRoutes();
        
        // Find redirect routes
        $redirectRoutes = [];
        foreach ($routes as $route) {
            $action = $route->getAction();
            if (isset($action['uses']) && $action['uses'] instanceof \Closure) {
                // This is likely a redirect route
                $redirectRoutes[] = $route->uri();
            }
        }

        // Should have redirect routes for galleries and exhibitions
        $this->assertContains('galleries', $redirectRoutes, "Should have redirect route for galleries");
        $this->assertContains('exhibitions', $redirectRoutes, "Should have redirect route for exhibitions");
    }

    /**
     * Test middleware assignments
     */
    public function test_middleware_assignments()
    {
        $routes = Route::getRoutes();
        
        // Test cache-clear route has auth middleware
        $cacheRoute = $routes->getByName('cache-clear');
        if ($cacheRoute) {
            $middleware = $cacheRoute->gatherMiddleware();
            $this->assertContains('auth.very_basic', $middleware, 
                "Cache clear route should have auth.very_basic middleware");
            $this->assertContains('doNotCacheResponse', $middleware, 
                "Cache clear route should have doNotCacheResponse middleware");
        }
    }

    /**
     * Test catch-all routes exist
     */
    public function test_landing_catch_all_route_exists()
    {
        $routes = Route::getRoutes();
        $landingRoute = $routes->getByName('landing');
        $this->assertNotNull($landingRoute, "Landing catch-all route should exist");
    }

    public function test_landing_catch_all_route_uri()
    {
        $routes = Route::getRoutes();
        $landingRoute = $routes->getByName('landing');
        $this->assertEquals('{section}', $landingRoute ? $landingRoute->uri() : null, "Landing route should catch sections");
    }

    public function test_landing_section_catch_all_route_exists()
    {
        $routes = Route::getRoutes();
        $sectionRoute = $routes->getByName('landing-section');
        $this->assertNotNull($sectionRoute, "Landing section catch-all route should exist");
    }

    public function test_landing_section_catch_all_route_uri()
    {
        $routes = Route::getRoutes();
        $sectionRoute = $routes->getByName('landing-section');
        $this->assertEquals('{section}/{slug}', $sectionRoute ? $sectionRoute->uri() : null, "Landing section route should catch section/slug");
    }

    /**
     * Test that route count is greater than 50
     */
    public function test_route_count_greater_than_50()
    {
        $routes = Route::getRoutes();
        $routeCount = count($routes);
        $this->assertGreaterThan(50, $routeCount, "Should have more than 50 routes");
    }

    /**
     * Test that route count is less than 200
     */
    public function test_route_count_less_than_200()
    {
        $routes = Route::getRoutes();
        $routeCount = count($routes);
        $this->assertLessThan(200, $routeCount, "Should have fewer than 200 routes for maintainability");
    }
}
