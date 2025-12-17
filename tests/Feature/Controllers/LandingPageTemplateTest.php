<?php

namespace Tests\Feature\Controllers;

use Tests\TestCase;
use Mockery;

class LandingPageTemplateTest extends TestCase
{

    protected function setUp(): void
    {
        parent::setUp();
        // This forcefully cleans up Mockery's entire container,
        // ensuring no mocks from previous tests can interfere.
        if (Mockery::getContainer() != null) {
            Mockery::getContainer()->mockery_tearDown();
        }
    }
    protected function tearDown(): void
    {
        Mockery::close();
        parent::tearDown();
    }

    public function test_get_landing_returns_array()
    {
        $result = \App\Models\LandingPageTemplate::getLanding('sample-slug');
        $this->assertIsArray($result);
    }
}
