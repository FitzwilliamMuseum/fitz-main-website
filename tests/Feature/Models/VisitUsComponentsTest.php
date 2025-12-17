<?php

namespace Tests\Feature\Models;

use Tests\TestCase;

class VisitUsComponentsTest extends TestCase
{
    public function test_find_returns_array()
    {
        $id = 1;
        $result = \App\Models\VisitUsComponents::find($id);
        $this->assertIsArray($result);
        $this->assertArrayHasKey('data', $result);
    }
}
