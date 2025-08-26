<?php

namespace Tests\Feature\Models;

use Tests\TestCase;

class TtnBiosTest extends TestCase
{
    public function test_list_returns_array()
    {
        $result = \App\Models\TtnBios::list();
        $this->assertIsArray($result);
    }

    public function test_list_returns_array_has_data_key()
    {
        $result = \App\Models\TtnBios::list();
        $this->assertArrayHasKey('data', $result);
    }

    public function test_list_filtered_returns_array()
    {
        $result = \App\Models\TtnBios::listFiltered('year_of_birth');
        $this->assertIsArray($result);
    }

    public function test_list_filtered_returns_array_has_data_key()
    {
        $result = \App\Models\TtnBios::listFiltered('year_of_birth');
        $this->assertArrayHasKey('data', $result);
    }

    public function test_find_returns_array()
    {
        $slug = 'test-slug';
        $result = \App\Models\TtnBios::find($slug);
        $this->assertIsArray($result);
    }
}
