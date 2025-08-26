<?php

namespace Tests\Feature\Models;

use Tests\TestCase;

class DirectorsTest extends TestCase
{
    public function test_get_directors_returns_array()
    {
        $result = \App\Models\Directors::getDirectors();
        $this->assertIsArray($result);
    }

    public function test_get_directors_result_has_data_key()
    {
        $result = \App\Models\Directors::getDirectors();
        $this->assertArrayHasKey('data', $result);
    }

    public function test_get_director_returns_array()
    {
        $list = \App\Models\Directors::getDirectors();
        if (empty($list['data'])) {
            $this->markTestSkipped('No directors found in the API.');
        }
        $first = collect($list['data'])->first();
        $result = \App\Models\Directors::getDirector($first['slug']);
        $this->assertIsArray($result);
    }

    public function test_get_director_result_has_data_key()
    {
        $list = \App\Models\Directors::getDirectors();
        if (empty($list['data'])) {
            $this->markTestSkipped('No directors found in the API.');
        }
        $first = collect($list['data'])->first();
        $result = \App\Models\Directors::getDirector($first['slug']);
        $this->assertArrayHasKey('data', $result);
    }
}
