<?php

namespace Tests\Unit\Config;

use Tests\TestCase;

class SolariumConfigTest extends TestCase
{
    public function test_solarium_config_is_array()
    {
        $config = config('solarium');
        $this->assertIsArray($config);
    }

    public function test_solarium_config_has_endpoint_key()
    {
        $config = config('solarium');
        $this->assertArrayHasKey('endpoint', $config);
    }

    public function test_solarium_config_endpoint_has_localhost_key()
    {
        $config = config('solarium');
        $this->assertArrayHasKey('localhost', $config['endpoint']);
    }

    public function test_solarium_config_endpoint_localhost_is_array()
    {
        $config = config('solarium');
        $this->assertIsArray($config['endpoint']['localhost']);
    }

    public function test_solarium_config_endpoint_localhost_has_host_key()
    {
        $config = config('solarium');
        $this->assertArrayHasKey('host', $config['endpoint']['localhost']);
    }

    public function test_solarium_config_endpoint_localhost_host_is_string()
    {
        $config = config('solarium');
        $this->assertIsString($config['endpoint']['localhost']['host']);
    }
}
