<?php

namespace Tests\Unit\Config;

use Tests\TestCase;

class MissingPageRedirectorConfigTest extends TestCase
{
    public function test_missing_page_redirector_config_is_array()
    {
        $config = config('missing-page-redirector');
        $this->assertIsArray($config);
    }

    public function test_missing_page_redirector_config_has_redirector_key()
    {
        $config = config('missing-page-redirector');
        $this->assertArrayHasKey('redirector', $config);
    }

    public function test_missing_page_redirector_config_has_redirect_status_codes_key()
    {
        $config = config('missing-page-redirector');
        $this->assertArrayHasKey('redirect_status_codes', $config);
    }

    public function test_missing_page_redirector_config_has_redirects_key()
    {
        $config = config('missing-page-redirector');
        $this->assertArrayHasKey('redirects', $config);
    }

    public function test_missing_page_redirector_config_redirect_status_codes_is_array()
    {
        $config = config('missing-page-redirector');
        $this->assertIsArray($config['redirect_status_codes']);
    }

    public function test_missing_page_redirector_config_redirects_is_array()
    {
        $config = config('missing-page-redirector');
        $this->assertIsArray($config['redirects']);
    }

    public function test_missing_page_redirector_config_redirects_is_not_empty()
    {
        $config = config('missing-page-redirector');
        $this->assertNotEmpty($config['redirects']);
    }

    public function test_missing_page_redirector_config_sample_redirect_exists()
    {
        $config = config('missing-page-redirector');
        $this->assertArrayHasKey('/index.html', $config['redirects']);
    }

    public function test_missing_page_redirector_config_sample_redirect_value()
    {
        $config = config('missing-page-redirector');
        $this->assertEquals('/', $config['redirects']['/index.html']);
    }
}
