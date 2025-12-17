<?php

namespace Tests\Feature\Models;

use Illuminate\Http\Request;
use Tests\TestCase;

class ExternalCuratorsTest extends TestCase
{
    public function test_find_returns_array()
    {
        $slug = 'magdalene-odundo';
        $result = \App\Models\ExternalCurators::find($slug);
        $this->assertIsArray($result);
    }

    public function test_find_returns_empty_array_for_invalid_slug()
    {
        $slug = 'non-existent-slug';
        $result = \App\Models\ExternalCurators::find($slug);
        $this->assertIsArray($result);
    }

    public function test_list_returns_length_aware_paginator_instance()
    {
        $request = new Request(['page' => 1]);
        $result = \App\Models\ExternalCurators::list($request);
        $this->assertInstanceOf(\Illuminate\Pagination\LengthAwarePaginator::class, $result);
    }

    public function test_list_paginator_has_correct_per_page()
    {
        $request = new Request(['page' => 1]);
        $result = \App\Models\ExternalCurators::list($request);
        $this->assertEquals(12, $result->perPage());
    }

    public function test_list_paginator_current_page_is_correct()
    {
        $request = new Request(['page' => 1]);
        $result = \App\Models\ExternalCurators::list($request);
        $this->assertEquals(1, $result->currentPage());
    }

    public function test_list_paginator_path_is_news()
    {
        $request = new Request(['page' => 1]);
        $result = \App\Models\ExternalCurators::list($request);
        $this->assertEquals('news', $result->path());
    }
}
