<?php

namespace Tests\Unit;

use App\DirectUs;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Carbon;
use Tests\TestCase;
use Mockery;

class DirectUsTest extends TestCase
{
    public function setUp(): void
    {
        parent::setUp();
        // Ensure environment variable is set for test
        Config::set('app.env', 'testing');
        // Use the value from the .env file if set, otherwise fallback to default
        putenv('DIRECTUS_URL=' . env('DIRECTUS_URL', 'https://example.com/api/'));
    }

    public function tearDown(): void
    {
        parent::tearDown();
        putenv('DIRECTUS_URL');
    }

    public function testBuildQuery()
    {
        $directUs = new DirectUs('/items', ['foo' => 'bar', 'baz' => 1]);
        $this->assertEquals('?foo=bar&baz=1', $directUs->buildQuery());
    }


    public function testGetDataReturnsCachedData()
    {
        $endpoint = '/items';
        $args = ['foo' => 'bar'];
        $url = getenv('DIRECTUS_URL') . $endpoint . '?' . http_build_query($args);
        $key = md5($url);
        $expected = ['data' => ['foo' => 'bar']];

        // Mock Carbon::now()
        $now = Carbon::parse('2025-08-20 12:00:00');
        Carbon::setTestNow($now);

        Cache::shouldReceive('has')->with($key)->andReturn(true);
        Cache::shouldReceive('get')->with($key)->andReturn($expected);

        $directUs = new DirectUs($endpoint, $args);
        $this->assertEquals($expected, $directUs->getData());

        Carbon::setTestNow(); // Clear test now
    }

    public function testGetDataFetchesAndCachesData()
    {
        $endpoint = '/items';
        $args = ['foo' => 'bar'];
        $url = getenv('DIRECTUS_URL') . $endpoint . '?' . http_build_query($args);
        $key = md5($url);
        $expected = ['data' => ['foo' => 'bar']];

        // Mock Carbon::now()
        $now = Carbon::parse('2025-08-20 12:00:00');
        Carbon::setTestNow($now);

        Cache::shouldReceive('has')->with($key)->andReturn(false);
        Http::shouldReceive('get')->with($url)->andReturnSelf();
        Http::shouldReceive('json')->andReturn($expected);
        $expectedExpiration = $now->addMinutes(30)->timestamp;
        Cache::shouldReceive('put')->with(
            $key,
            $expected,
            Mockery::on(function ($carbon) use ($expectedExpiration) {
                return $carbon instanceof Carbon && $carbon->timestamp === $expectedExpiration;
            })
        );

        $directUs = new DirectUs($endpoint, $args);
        $this->assertEquals($expected, $directUs->getData());

        Carbon::setTestNow(); // Clear test now
    }
}
