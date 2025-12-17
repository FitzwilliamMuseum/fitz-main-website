<?php

namespace Tests\Feature\Models;


use App\Models\Cases;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Tests\TestCase;

class CasesTest extends TestCase
{
    public function test_list_returns_array()
    {
        $result = Cases::list(1); // Use a valid exhibition id if possible
        $this->assertIsArray($result);
    }

    public function test_paginator_returns_length_aware_paginator()
    {
        $request = new Request(['page' => 1]);
        $result = Cases::paginator($request);
        $this->assertInstanceOf(LengthAwarePaginator::class, $result);
    }

    public function test_paginator_has_items()
    {
        $request = new Request(['page' => 1]);
        $result = Cases::paginator($request);
        $this->assertIsArray($result->items());
    }

    public function test_paginator_total_is_integer()
    {
        $request = new Request(['page' => 1]);
        $result = Cases::paginator($request);
        $this->assertIsInt($result->total());
    }

    public function test_paginator_current_page_is_integer()
    {
        $request = new Request(['page' => 1]);
        $result = Cases::paginator($request);
        $this->assertIsInt($result->currentPage());
    }

    public function test_paginator_per_page_is_integer()
    {
        $request = new Request(['page' => 1]);
        $result = Cases::paginator($request);
        $this->assertIsInt($result->perPage());
    }

    public function test_find_returns_array()
    {
        $result = Cases::find('test-slug'); // Use a valid slug if possible
        $this->assertIsArray($result);
    }
}
