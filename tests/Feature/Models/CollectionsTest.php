<?php

namespace Tests\Feature\Models;

use Tests\TestCase;

class CollectionsTest extends TestCase
{
    public function test_list_returns_array()
    {
        $result = \App\Models\Collections::list();
        $this->assertIsArray($result);
    }

    public function test_list_array_has_data_key()
    {
        $result = \App\Models\Collections::list();
        $this->assertArrayHasKey('data', $result);
    }

    public function test_find_returns_array()
    {
        $list = \App\Models\Collections::list();
        if (empty($list['data'])) {
            $this->markTestSkipped('No collections found in the API.');
        }
        $first = collect($list['data'])->first();
        $result = \App\Models\Collections::find($first['slug']);
        $this->assertIsArray($result);
    }
}
