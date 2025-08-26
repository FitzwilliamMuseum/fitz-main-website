<?php

namespace Tests\Feature\Controllers;

use Illuminate\Support\Facades\Artisan;
use Tests\TestCase;
use Mockery;

class ControllerTest extends TestCase
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
    /**
     * Test the clearCache route returns the expected string and clears cache.
     */
    public function test_clear_cache_route()
    {
        $user = env('SHIELD_USER');
        $password = env('SHIELD_PASSWORD');
        $response = $this->get(route('cache-clear'), [
            'PHP_AUTH_USER' => $user,
            'PHP_AUTH_PW' => $password,
        ]);
        $response->assertStatus(200);
        $response->assertSee('Cache is cleared');
    }
}
