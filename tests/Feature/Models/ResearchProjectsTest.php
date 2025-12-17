<?php

namespace Tests\Feature\Models;

use Illuminate\Http\Request;
use Tests\TestCase;

class ResearchProjectsTest extends TestCase
{
    public function test_list_returns_paginator()
    {
        $request = new Request(['page' => 1]);
        $result = \App\Models\ResearchProjects::list($request);
        $this->assertInstanceOf(\Illuminate\Pagination\LengthAwarePaginator::class, $result);
    }

    public function test_find_returns_array()
    {
        $result = \App\Models\ResearchProjects::find('ancient-egypt-gallery-redisplay'); // Use a valid slug if possible
        $this->assertIsArray($result);
    }

    public function test_find_by_department_returns_array()
    {
        $result = \App\Models\ResearchProjects::findByDepartment();
        $this->assertIsArray($result);
    }

    public function test_list_simple_returns_array()
    {
        $result = \App\Models\ResearchProjects::listSimple();
        $this->assertIsArray($result);
    }
}
