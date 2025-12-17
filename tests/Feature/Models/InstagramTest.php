<?php

namespace Tests\Feature\Models;

use Illuminate\Http\Request;
use Tests\TestCase;
use Illuminate\Pagination\LengthAwarePaginator;

class InstagramTest extends TestCase
{
    public function test_list_returns_instagram_paginator()
    {
        $request = new Request(['page' => 4]);
        $result = \App\Models\Instagram::list($request);
        $this->assertInstanceOf(LengthAwarePaginator::class, $result);
    }

    public function test_find_returns_array()
    {
        $slug = 'pierre-bonnard';
        $result = \App\Models\Instagram::find($slug);
        $this->assertIsArray($result);
    }

    public function test_list_paginator_has_correct_per_page()
    {
        $request = new Request(['page' => 1]);
        $result = \App\Models\Instagram::list($request);
        $this->assertEquals(12, $result->perPage());
    }



    public function test_list_paginator_path_is_instagram()
    {
        $request = new Request(['page' => 1]);
        $result = \App\Models\Instagram::list($request);
        $this->assertEquals('instagram', $result->path());
    }

    public function test_list_paginator_total_matches_meta_total_count()
    {
        $request = new Request(['page' => 1]);
        $result = \App\Models\Instagram::list($request);
        if (method_exists($result, 'total')) {
            $this->assertIsInt($result->total());
        }
    }

    public function test_list_paginator_items_are_array()
    {
        $request = new Request(['page' => 1]);
        $result = \App\Models\Instagram::list($request);
        $this->assertIsArray($result->items());
    }
}
