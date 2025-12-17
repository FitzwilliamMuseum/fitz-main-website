<?php

namespace Tests\Feature\Models;

use Tests\TestCase;

class GalleriesTest extends TestCase
{
    public function test_list_returns_array()
    {
        $result = \App\Models\Galleries::list();
        $this->assertIsArray($result);
    }

    public function test_list_result_has_data_key()
    {
        $result = \App\Models\Galleries::list();
        $this->assertArrayHasKey('data', $result);
    }
    public function test_find_returns_array()
    {
        $result = \App\Models\Galleries::find('test-slug'); // Use a valid slug if possible
        $this->assertIsArray($result);
    }

    public function test_find_result_has_data_key()
    {
        $result = \App\Models\Galleries::find('test-slug'); // Use a valid slug if possible
        $this->assertArrayHasKey('data', $result);
    }
}
