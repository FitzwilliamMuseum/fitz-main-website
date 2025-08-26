<?php

namespace Tests\Feature\Models;

use Tests\TestCase;

class LandingPageTemplateTest extends TestCase
{
    public function test_get_landing_returns_array()
    {
        $result = \App\Models\LandingPageTemplate::getLanding('support-us');
        $this->assertIsArray($result);
    }

    public function test_get_landing_returns_array_has_data_key()
    {
        $result = \App\Models\LandingPageTemplate::getLanding('support-us');
        $this->assertArrayHasKey('data', $result);
    }

    public function test_get_landing_with_empty_slug_returns_array()
    {
        $result = \App\Models\LandingPageTemplate::getLanding();
        $this->assertIsArray($result);
    }

    public function test_get_landing_with_empty_slug_returns_array_has_data_key()
    {
        $result = \App\Models\LandingPageTemplate::getLanding();
        $this->assertArrayHasKey('data', $result);
    }
}
