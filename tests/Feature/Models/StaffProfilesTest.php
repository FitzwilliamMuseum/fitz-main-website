<?php

namespace Tests\Feature\Models;

use Illuminate\Http\Request;
use Tests\TestCase;

class StaffProfilesTest extends TestCase
{
    public function test_list_returns_paginator()
    {
        $request = new Request(['page' => 1]);
        $result = \App\Models\StaffProfiles::list($request);
        $this->assertInstanceOf(\Illuminate\Pagination\LengthAwarePaginator::class, $result);
    }

    public function test_allstaff_returns_paginator()
    {
        $request = new Request(['page' => 1]);
        $result = \App\Models\StaffProfiles::allstaff($request);
        $this->assertInstanceOf(\Illuminate\Pagination\LengthAwarePaginator::class, $result);
    }

    public function test_find_returns_array()
    {
        // Use a slug that exists in your test database or mock DirectUs if needed
        $slug = 'suzanne-reynolds';
        $result = \App\Models\StaffProfiles::find($slug);
        $this->assertIsArray($result);
    }

    public function test_find_by_department_returns_array()
    {
        // Use a department id that exists in your test database or mock DirectUs if needed
        $departmentId = 1;
        $result = \App\Models\StaffProfiles::findByDepartment($departmentId);
        $this->assertIsArray($result);
    }
}
