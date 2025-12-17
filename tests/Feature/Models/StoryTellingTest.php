<?php

namespace Tests\Feature\Models;

use Tests\TestCase;

class StoryTellingTest extends TestCase
{
    public function test_list_returns_array()
    {
        $result = \App\Models\StoryTelling::list();
        $this->assertIsArray($result);
    }
}
