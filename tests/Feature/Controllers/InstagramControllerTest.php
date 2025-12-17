<?php

namespace Tests\Feature\Controllers;
use Mockery;

use Tests\TestCase;

class InstagramControllerTest extends TestCase
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
     * @return void
     */
    public function test_instagram_method_is_skipped()
    {
        $this->markTestSkipped('Instagram functionality is deprecated.');
    }
}
