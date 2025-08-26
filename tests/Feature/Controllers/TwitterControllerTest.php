<?php

namespace Tests\Feature\Controllers;

use Tests\TestCase;

class TwitterControllerTest extends TestCase
{
    /**
     * @return void
     */
    public function test_twitter_method_is_skipped()
    {
        $this->markTestSkipped('Twitter functionality is deprecated.');
    }
}
