<?php

namespace Tests\Feature\Models;

use Illuminate\Http\Request;
use Tests\TestCase;

class OnlineResourcesTest extends TestCase
{
    public function test_list_returns_paginator()
    {
        $request = new Request(['page' => 1]);
        $result = \App\Models\OnlineResources::list($request);
        $this->assertInstanceOf(\Illuminate\Pagination\LengthAwarePaginator::class, $result);
    }

    public function test_find_returns_array()
    {
        $result = \App\Models\OnlineResources::find('from-the-land-of-the-golden-fleece');
        $this->assertIsArray($result);
    }
}
