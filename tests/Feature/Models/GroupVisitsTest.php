<?php

namespace Tests\Feature\Models;

use Tests\TestCase;

class GroupVisitsTest extends TestCase
{
    public function test_list_returns_array()
    {
        $result = \App\Models\GroupVisits::list();
        $this->assertIsArray($result);
    }

    public function test_list_result_has_data_key()
    {
        $result = \App\Models\GroupVisits::list();
        $this->assertArrayHasKey('data', $result);
    }
}
