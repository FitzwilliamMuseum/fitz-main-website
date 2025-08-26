<?php

namespace Tests\Feature\Models;

use Tests\TestCase;

class LookThinkDoTest extends TestCase
{
    public function test_list_returns_array()
    {
        $result = \App\Models\LookThinkDo::list();
        $this->assertIsArray($result);
    }

    public function test_find_returns_array()
    {
        $result = \App\Models\LookThinkDo::find('springtime');
        $this->assertIsArray($result);
    }

    public function test_list_contains_data_key()
    {
        $result = \App\Models\LookThinkDo::list();
        $this->assertIsArray($result);
        $this->assertArrayHasKey('data', $result);
    }

    public function test_find_contains_data_key()
    {
        $result = \App\Models\LookThinkDo::find('springtime');
        $this->assertIsArray($result);
        $this->assertArrayHasKey('data', $result);
    }
}
