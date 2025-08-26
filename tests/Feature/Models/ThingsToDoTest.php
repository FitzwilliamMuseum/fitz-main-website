<?php

namespace Tests\Feature\Models;

use Tests\TestCase;

class ThingsToDoTest extends TestCase
{
    public function test_list_returns_array()
    {
        $result = \App\Models\ThingsToDo::list();
        $this->assertIsArray($result);
    }

    public function test_list_returns_array_has_data_key()
    {
        $result = \App\Models\ThingsToDo::list();
        $this->assertArrayHasKey('data', $result);
    }

    public function test_list_all_returns_array()
    {
        $result = \App\Models\ThingsToDo::listAll();
        $this->assertIsArray($result);
    }

    public function test_list_all_returns_array_has_data_key()
    {
        $result = \App\Models\ThingsToDo::listAll();
        $this->assertArrayHasKey('data', $result);
    }

    public function test_list_all_with_limit_returns_array()
    {
        $result = \App\Models\ThingsToDo::listAll(10);
        $this->assertIsArray($result);
    }

    public function test_list_all_with_limit_returns_array_has_data_key()
    {
        $result = \App\Models\ThingsToDo::listAll(10);
        $this->assertArrayHasKey('data', $result);
    }
}
