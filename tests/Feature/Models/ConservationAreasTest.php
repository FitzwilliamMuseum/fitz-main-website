<?php

namespace Tests\Feature\Models;

use Tests\TestCase;

class ConservationAreasTest extends TestCase
{
    public function test_list_returns_array()
    {
        $result = \App\Models\ConservationAreas::list();
        $this->assertIsArray($result);
    }

    public function test_list_array_has_data_key()
    {
        $result = \App\Models\ConservationAreas::list();
        $this->assertArrayHasKey('data', $result);
    }

    public function test_find_returns_array_for_valid_slug()
    {
        $list = \App\Models\ConservationAreas::list();
        if (empty($list['data'])) {
            $this->markTestSkipped('No conservation areas found in the API.');
        }
        $first = collect($list['data'])->first();
        $result = \App\Models\ConservationAreas::find($first['slug']);
        $this->assertIsArray($result);
    }
}
