<?php

namespace Tests\Feature\Models;

use Tests\TestCase;

class AssociatedPeopleTest extends TestCase
{
    public function test_list_returns_array()
    {
        $result = \App\Models\AssociatedPeople::list();
        $this->assertIsArray($result);
    }

    public function test_list_array_has_data_key()
    {
        $result = \App\Models\AssociatedPeople::list();
        $this->assertArrayHasKey('data', $result);
    }

    public function test_find_returns_array()
    {
        $list = \App\Models\AssociatedPeople::list();
        if (empty($list['data'])) {
            $this->markTestSkipped('No associated people found in the API.');
        }
        $first = collect($list['data'])->first();
        $result = \App\Models\AssociatedPeople::find($first['slug']);
        $this->assertIsArray($result);
    }

    public function test_find_array_has_data_key()
    {
        $list = \App\Models\AssociatedPeople::list();
        if (empty($list['data'])) {
            $this->markTestSkipped('No associated people found in the API.');
        }
        $first = collect($list['data'])->first();
        $result = \App\Models\AssociatedPeople::find($first['slug']);
        $this->assertArrayHasKey('data', $result);
    }
}
