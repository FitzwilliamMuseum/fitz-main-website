<?php

namespace Tests\Unit\FitzElastic;

use App\FitzElastic\Elastic;
use Elasticsearch\Client;
use Elasticsearch\ClientBuilder;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Carbon;
use Mockery;
use Tests\TestCase;

class ElasticTest extends TestCase
{

    public function setUp(): void
    {
        parent::setUp();
        // Use values from .env file for Elastic hosts
        // No need to set config or putenv, env() will read from .env
    }


    public function tearDown(): void
    {
        parent::tearDown();
        // No need to clear config or env, as env() will always read from .env
    }

    public function testSetAndGetParams()
    {
        $elastic = new Elastic();
        $params = ['index' => 'test', 'body' => ['query' => ['match_all' => (object)[]]]];
        $elastic->setParams($params);
        $this->assertEquals($params, $elastic->getParams());
    }

    public function testGetKey()
    {
        $elastic = new Elastic();
        $params = ['foo' => 'bar'];
        $elastic->setParams($params);
        $this->assertEquals(md5(json_encode($params)), $elastic->getKey());
    }

    public function testGetHosts()
    {
        $elastic = new Elastic();
        $expected = [[
            'scheme' => env('ELASTIC_SCHEME'),
            'host' => env('ELASTIC_API'),
            'path' => env('ELASTIC_PATH'),
            'port' => 80
        ]];
        $this->assertEquals($expected, $elastic->getHosts());
    }

    public function testGetCountCallsElasticClient()
    {
        $params = ['index' => 'test'];
        $elastic = Mockery::mock(Elastic::class)->makePartial();
        $elastic->setParams($params);
        $mockClient = Mockery::mock(Client::class);
        $elastic->shouldAllowMockingProtectedMethods()
            ->shouldReceive('getElasticClient')
            ->andReturn($mockClient);
        $elastic->shouldReceive('getParams')->andReturn($params);
        $mockClient->shouldReceive('count')->with($params)->andReturn(['count' => 42]);
        $this->assertEquals(['count' => 42], $elastic->getCount());
    }

    public function testGetSearchReturnsCachedData()
    {
        $params = ['index' => 'test'];
        $elastic = Mockery::mock(Elastic::class)->makePartial();
        $elastic->setParams($params);
        $key = $elastic->getKey();
        $expected = ['hits' => ['total' => 1]];
        Cache::shouldReceive('has')->with($key)->andReturn(true);
        Cache::shouldReceive('get')->with($key)->andReturn($expected);
        $this->assertEquals($expected, $elastic->getSearch());
    }

    public function testGetSearchFetchesAndCachesData()
    {
        $params = ['index' => 'test'];
        $elastic = Mockery::mock(Elastic::class)->makePartial();
        $elastic->setParams($params);
        $key = $elastic->getKey();
        $expected = ['hits' => ['total' => 1]];
        $mockClient = Mockery::mock(Client::class);
        $elastic->shouldAllowMockingProtectedMethods()
            ->shouldReceive('getElasticClient')
            ->andReturn($mockClient);
        $elastic->shouldReceive('getParams')->andReturn($params);
        Cache::shouldReceive('has')->with($key)->andReturn(false);
        $mockClient->shouldReceive('search')->with($params)->andReturn($expected);
        // Flexible matcher for Carbon expiration
        Cache::shouldReceive('put')->with(
            $key,
            $expected,
            Mockery::on(function ($carbon) {
                return $carbon instanceof Carbon;
            })
        );
        $this->assertEquals($expected, $elastic->getSearch());
    }
}
