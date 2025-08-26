<?php

namespace Tests\Feature\Models;

use Tests\TestCase;

class SubpagesTest extends TestCase
{
    public function test_get_subpage_returns_array()
    {
        $result = \App\Models\Subpages::getSubpage('sample-slug');
        $this->assertIsArray($result);
    }
}
