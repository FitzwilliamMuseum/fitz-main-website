<?php

namespace Tests\Feature\Models;

use Tests\TestCase;

class CarouselsTest extends TestCase
{
    public function test_find_by_section_returns_array()
    {
        $result = \App\Models\Carousels::findBySection('home');
        $this->assertIsArray($result);
    }

    public function test_find_by_section_result_has_data_key()
    {
        $result = \App\Models\Carousels::findBySection('home');
        $this->assertArrayHasKey('data', $result);
    }
}
