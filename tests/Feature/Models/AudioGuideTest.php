<?php

namespace Tests\Feature\Models;

use Tests\TestCase;

class AudioGuideTest extends TestCase
{
    public function test_list_returns_array()
    {
        $result = \App\Models\AudioGuide::list();
        $this->assertIsArray($result);
    }

    public function test_list_result_has_data_key()
    {
        $result = \App\Models\AudioGuide::list();
        $this->assertArrayHasKey('data', $result);
    }

    public function test_find_returns_array()
    {
        $list = \App\Models\AudioGuide::list();
        if (empty($list['data'])) {
            $this->markTestSkipped('No audio guides found in the API.');
        }
        $first = collect($list['data'])->first();
        $result = \App\Models\AudioGuide::find($first['slug']);
        $this->assertIsArray($result);
    }

    public function test_find_result_has_data_key()
    {
        $list = \App\Models\AudioGuide::list();
        if (empty($list['data'])) {
            $this->markTestSkipped('No audio guides found in the API.');
        }
        $first = collect($list['data'])->first();
        $result = \App\Models\AudioGuide::find($first['slug']);
        $this->assertArrayHasKey('data', $result);
    }
}
