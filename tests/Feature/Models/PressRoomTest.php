<?php

namespace Tests\Feature\Models;

use Illuminate\Http\Request;
use Tests\TestCase;
use Illuminate\Pagination\LengthAwarePaginator;

class PressRoomTest extends TestCase
{
    public function test_list_returns_paginator()
    {
        $request = new Request(['page' => 1]);
        $result = \App\Models\PressRoom::list($request);
        $this->assertInstanceOf(\Illuminate\Pagination\LengthAwarePaginator::class, $result);
    }
}
