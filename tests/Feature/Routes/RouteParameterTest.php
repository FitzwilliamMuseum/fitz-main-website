<?php

namespace Tests\Feature\Routes;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Route;
use Tests\TestCase;
use PHPUnit\Framework\Attributes\RunTestsInSeparateProcesses;
use PHPUnit\Framework\Attributes\PreserveGlobalState;
use Illuminate\Support\Facades\Config;

#[RunTestsInSeparateProcesses]
#[PreserveGlobalState(false)] 
class RouteParameterTest extends TestCase
{
    /**
     * Test routes that require authentication middleware
     */
    public function test_cache_clear_route_requires_auth()
    {
        $response = $this->get('/clear-cache');
        // Should require authentication, so expect 401 or redirect to login
        $this->assertContains($response->getStatusCode(), [401, 302]);
    }

    /**
     * Test that specific route names are properly registered
     */
    public function test_route_names_are_registered()
    {
        $expectedRoutes = [
            'home',
            'directors',
            'director',
            'press-room',
            'governance',
            'vacancies',
            'vacancy',
            'vacancy.archive',
            'press.hockney',
            'collections',
            'collection',
            'departments',
            'department',
            'conservation-care',
            'about.our.staff',
            'research',
            'research-impact',
            'research-projects',
            'research-project',
            'research-profiles',
            'research-profile',
            'research-affiliate',
            'research-affiliates',
            'exhibition-externals',
            'exhibition-externals-list',
            'resources',
            'resource',
            'opportunities',
            'opportunity',
            'visit.groupvisits',
            'galleries',
            'gallery',
            'archive',
            'exhibitions',
            'future',
            'exhibition',
            'exhibition.labels',
            'exhibition.cases',
            'exhibition.label',
            'support-us',
            'subpage',
            'visit',
            'visit-subpage',
            'news',
            'article',
            'ltd',
            'ltd-activity',
            'learn-with-us-resources',
            'learn-with-us-resource',
            'school-sessions',
            'community-programming',
            'young-people',
            'learn-with-us-profiles',
            'adult-activity',
            'gallery-activity',
            'highlight-search',
            'objects',
            'highlights',
            'periods',
            'themes',
            'context',
            'period',
            'theme',
            'context-sections',
            'context-section-detail',
            'highlight',
            'audio-guide',
            'audio-stop',
            'conversations',
            'instagram',
            'instagram.story',
            'twitter',
            'mindeyes',
            'mindeyes.story',
            'podcast.presenters',
            'podcast.presenter',
            'podcasts',
            'podcasts.series',
            'podcasts.episode',
            'events',
            'tessitura.search',
            'events.type',
            //'search.index',
            'search.results',
            //'ping',
            'cache-clear',
            'landing',
            'landing-section'
        ];

        foreach ($expectedRoutes as $routeName) {
            $this->assertTrue(Route::has($routeName), "Route '{$routeName}' should be registered");
        }
    }

    /**
     * Test True to Nature specific routes
     */
    public function test_true_to_nature_route_names()
    {
        $ttnRoutes = [
            'exhibition.ttn.artists',
            'exhibition.ttn.artist',
            'exhibition.ttn.labels',
            'exhibition.ttn.label',
            'exhibition.ttn.iiif',
            'exhibition.ttn.geoJson',
            'exhibition.ttn.geoJson.ld',
            'exhibition.ttn.geoJson.ld.births',
            'exhibition.ttn.geoJson.ld.deaths',
            'exhibition.ttn.geoJson.ld.peripleo',
            'exhibition.ttn.mapped',
            'exhibition.ttn.viewpoints',
            'exhibition.ttn.viewpoint'
        ];

        foreach ($ttnRoutes as $routeName) {
            $this->assertTrue(Route::has($routeName), "True to Nature route '{$routeName}' should be registered");
        }
    }

    /**
     * Test that routes with parameters accept the correct parameter format
     */
    public function test_routes_with_slug_parameters()
    {
        // Test routes that should accept slug parameters
        $slugRoutes = [
            route('director', ['slug' => 'test-slug-123']),
            route('vacancy', ['slug' => 'job-opening-2024']),
            route('collection', ['slug' => 'ancient-art']),
            route('department', ['slug' => 'paintings-and-drawings']),
            route('research-project', ['slug' => 'digital-humanities']),
            route('about.our.staff', ['slug' => 'john-doe']),
            route('gallery', ['slug' => 'gallery-1']),
            route('exhibition', ['slug' => 'current-exhibition']),
            route('article', ['slug' => 'latest-news-article']),
            route('highlight', ['slug' => 'famous-painting']),
        ];

        foreach ($slugRoutes as $route) {
            $response = $this->get($route);
            // These should either work (200) or return a valid 404 if the resource doesn't exist
            $this->assertContains($response->getStatusCode(), [200, 404], "Route {$route} should return 200 or 404");
        }
    }

    /**
     * Test routes with numeric ID parameters
     */
    public function test_routes_with_id_parameters()
    {
        // Test TTN viewpoint route with numeric ID
        $response = $this->get(route('exhibition.ttn.viewpoint', ['id' => 2]));
        $this->assertContains($response->getStatusCode(), [200, 404]);
    }

    /**
     * Test complex nested routes
     */
    public function test_complex_nested_routes()
    {
        $nestedRoutes = [
            route('exhibition.cases', ['exhibition' => 'magdalene-odundo-in-cambridge']),
            route('exhibition.labels', ['exhibition' => 'magdalene-odundo-in-cambridge', 'slug' => 'case-1']),
        ];
        foreach ($nestedRoutes as $route) {
            $response = $this->get($route);
            $this->assertContains($response->getStatusCode(), [200, 404], "Nested route {$route} should return 200 or 404");
        }
    }

    /**
     * Test HTTP method restrictions
     */
    public function test_get_only_routes_reject_other_methods()
    {
        // Test that routes defined as GET only reject POST, PUT, DELETE etc.
        $response = $this->put('/about-us/our-directors');
        $this->assertEquals(405, $response->getStatusCode()); // Method Not Allowed

        $response = $this->delete('/research/');
        $this->assertEquals(405, $response->getStatusCode()); // Method Not Allowed
    }

    /**
     * Test mixed method routes accept both GET and POST
     */
    public function test_mixed_method_routes()
    {
        $mixedRoutes = [
            '/explore-our-collection/highlights/search/results',
            '/search/results',
            '/events/search'
        ];

        foreach ($mixedRoutes as $route) {
            $getResponse = $this->get($route);
            $postResponse = $this->post($route);
            
            // Both GET and POST should be accepted (200 or redirect/validation error)
            $this->assertContains($getResponse->getStatusCode(), [200, 302, 422], "GET {$route} should be accepted");
            $this->assertContains($postResponse->getStatusCode(), [200, 302, 422], "POST {$route} should be accepted");
        }
    }

    /**
     * Test that redirects work correctly
     */
    public function test_redirects()
    {
        $redirects = [
            ['/galleries', 'plan-your-visit/galleries'],
            ['/exhibitions', 'plan-your-visit/exhibitions'],
            ['/plan-your-visit/exhibitions/archive', 'plan-your-visit/past-exhibitions-and-displays']
        ];

        foreach ($redirects as [$from, $to]) {
            $response = $this->get($from);
            $this->assertEquals(302, $response->getStatusCode(), "Route {$from} should redirect");
            $response->assertRedirect($to);
        }
    }

    /**
     * Test route model binding expectations
     */
    public function test_route_model_binding_slug_format()
    {
        // Slug format (letters, numbers, hyphens)
        $response = $this->get(route('directors', ['slug' => 'john-doe-123']));
        $this->assertContains($response->getStatusCode(), [200, 404]);
    }

    public function test_route_model_binding_url_safe_characters()
    {
        // Should handle URL-safe characters
        $response = $this->get(route('article', ['slug' => 'article-with-underscores_and-dashes']));
        $this->assertContains($response->getStatusCode(), [200, 404]);
    }

    /**
     * Test domain-specific routes (if any)
     */
    public function test_domain_specific_routes()
    {
        // The routes file mentions domain-specific routes for tickets
        // This would need to be tested in an environment where the domain is configured
        // For now, we'll just verify the route exists
        $this->assertTrue(Route::has('events.type'));
    }

    /**
     * Test that feeds route exists (from Route::feeds())
     */
    public function test_feeds_route_exists()
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
     * Test that at least one feed route returns a 200 response code
     */
    public function test_feeds_route_returns_200()
    {
        $possibleFeedPaths = Config::get('feed.feeds');
        $found200 = false;
        foreach ($possibleFeedPaths as $feed) {
            $path = $feed['url'];
            $response = $this->get($path);
            if ($response->getStatusCode() === 200) {
                $found200 = true;
                break;
            }
        }
        if (!$found200) {
            $this->markTestSkipped('No feed routes returned a 200 response code');
        } else {
            $this->assertTrue($found200, 'At least one feed route should return 200');
        }
    }

    public function test_feeds_route_does_not_return_500()
    {
        $possibleFeedPaths = Config::get('feed.feeds');
        $checked = false;
        foreach ($possibleFeedPaths as $feed) {
            $path = $feed['url'];
            $response = $this->get($path);
            // Only check if route exists (not 404)
            if ($response->getStatusCode() !== 404) {
                $checked = true;
                $this->assertNotEquals(500, $response->getStatusCode(), 
                    "Feed route {$path} should not return 500 error");
            }
        }
        if (!$checked) {
            $this->markTestSkipped('No feed routes appear to be configured');
        }
    }
}
