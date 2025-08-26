<?php

namespace Tests\Feature\Models;

use Tests\TestCase;

class DepartmentsTest extends TestCase
{
    public function test_list_returns_array()
    {
        $result = \App\Models\Departments::list();
        $this->assertIsArray($result);
    }

    public function test_list_result_has_data_key()
    {
        $result = \App\Models\Departments::list();
        $this->assertArrayHasKey('data', $result);
    }

    public function test_find_returns_array()
    {
        $list = \App\Models\Departments::list();
        if (empty($list['data'])) {
            $this->markTestSkipped('No departments found in the API.');
        }
        $first = collect($list['data'])->first();
        $result = \App\Models\Departments::find($first['slug']);
        $this->assertIsArray($result);
    }

    public function test_find_result_has_data_key()
    {
        $list = \App\Models\Departments::list();
        if (empty($list['data'])) {
            $this->markTestSkipped('No departments found in the API.');
        }
        $first = collect($list['data'])->first();
        $result = \App\Models\Departments::find($first['slug']);
        $this->assertArrayHasKey('data', $result);
    }
}
