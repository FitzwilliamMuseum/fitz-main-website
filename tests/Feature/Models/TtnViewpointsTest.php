<?php

namespace Tests\Feature\Models;

use Tests\TestCase;

class TtnViewpointsTest extends TestCase
{
    public function test_list_returns_array()
    {
        $result = \App\Models\TtnViewpoints::list();
        $this->assertIsArray($result);
    }

    public function test_list_result_has_data_key()
    {
        $result = \App\Models\TtnViewpoints::list();
        $this->assertArrayHasKey('data', $result);
    }

    public function test_find_returns_array()
    {
        $id = '1';
        $result = \App\Models\TtnViewpoints::find($id);
        $this->assertIsArray($result);
    }

    public function test_by_artist_returns_array()
    {
        $id = 1;
        $result = \App\Models\TtnViewpoints::byArtist($id);
        $this->assertIsArray($result);
    }
}
