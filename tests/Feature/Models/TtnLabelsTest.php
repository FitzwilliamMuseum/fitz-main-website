<?php

namespace Tests\Feature\Models;

use Tests\TestCase;

class TtnLabelsTest extends TestCase
{
    public function test_list_returns_array()
    {
        $result = \App\Models\TtnLabels::list();
        $this->assertIsArray($result);
    }

    public function test_list_returns_array_has_data_key()
    {
        $result = \App\Models\TtnLabels::list();
        $this->assertArrayHasKey('data', $result);
    }

    public function test_list_filtered_returns_array()
    {
        $result = \App\Models\TtnLabels::listFiltered('theme');
        $this->assertIsArray($result);
    }

    public function test_list_filtered_returns_array_has_data_key()
    {
        $result = \App\Models\TtnLabels::listFiltered('theme');
        $this->assertArrayHasKey('data', $result);
    }

    public function test_list_by_theme_returns_array()
    {
        $result = \App\Models\TtnLabels::listByTheme(1);
        $this->assertIsArray($result);
    }

    public function test_list_by_theme_returns_array_has_data_key()
    {
        $result = \App\Models\TtnLabels::listByTheme(1);
        $this->assertArrayHasKey('data', $result);
    }

    public function test_find_returns_array()
    {
        $slug = 'test-slug';
        $result = \App\Models\TtnLabels::find($slug);
        $this->assertIsArray($result);
    }

    public function test_by_artist_returns_array()
    {
        $id = 1;
        $result = \App\Models\TtnLabels::byArtist($id);
        $this->assertIsArray($result);
    }
}
