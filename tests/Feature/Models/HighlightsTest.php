<?php

namespace Tests\Feature\Models;

use Illuminate\Http\Request;
use Tests\TestCase;

class HighlightsTest extends TestCase
{
    public function test_list_returns_highlights_paginator()
    {
        $request = new Request(['page' => 1]);
        $result = \App\Models\Highlights::list($request);
        $this->assertInstanceOf(\Illuminate\Pagination\LengthAwarePaginator::class, $result);
    }

    public function test_find_returns_array()
    {
        $result = \App\Models\Highlights::find('test-slug'); // Use a valid slug if possible
        $this->assertIsArray($result);
    }

    public function test_get_periods_returns_array()
    {
        $result = \App\Models\Highlights::getPeriods();
        $this->assertIsArray($result);
    }

    public function test_find_by_period_returns_array()
    {
        $result = \App\Models\Highlights::findByPeriod('test-period'); // Use a valid period if possible
        $this->assertIsArray($result);
    }

    public function test_home_list_returns_array()
    {
        $result = \App\Models\Highlights::homeList();
        $this->assertIsArray($result);
    }

    public function test_list_paginator_has_correct_per_page()
    {
        $request = new Request(['page' => 1]);
        $result = \App\Models\Highlights::list($request);
        $this->assertEquals(12, $result->perPage());
    }

    public function test_list_paginator_current_page()
    {
        $request = new Request(['page' => 1]);
        $result = \App\Models\Highlights::list($request);
        $this->assertEquals(1, $result->currentPage());
    }

    public function test_list_paginator_path_is_set()
    {
        $request = new Request(['page' => 1]);
        $result = \App\Models\Highlights::list($request);
        $this->assertStringContainsString('highlights', $result->path());
    }

    public function test_list_paginator_total_count_matches_meta()
    {
        $request = new Request(['page' => 1]);
        $result = \App\Models\Highlights::list($request);
        // The paginator's total should match the meta total_count if available
        $items = $result->items();
        if (isset($items['meta']['total_count'])) {
            $this->assertEquals($items['meta']['total_count'], $result->total());
        } else {
            $this->assertIsInt($result->total());
        }
    }
}
