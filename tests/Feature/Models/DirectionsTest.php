<?php

namespace Tests\Feature\Models;

use Tests\TestCase;

class DirectionsTest extends TestCase
{
    public function test_list_returns_array()
    {
        $result = \App\Models\Directions::list();
        $this->assertIsArray($result);
    }

    public function test_list_result_has_data_key()
    {
        $result = \App\Models\Directions::list();
        $this->assertArrayHasKey('data', $result);
    }
}
