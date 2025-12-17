<?php

namespace Tests\Feature\Models;

use Tests\TestCase;

class TransportTest extends TestCase
{
    public function test_list_returns_array()
    {
        $result = \App\Models\Transport::list();
        $this->assertIsArray($result);
    }

    public function test_list_result_has_data_key()
    {
        $result = \App\Models\Transport::list();
        $this->assertArrayHasKey('data', $result);
    }
}
