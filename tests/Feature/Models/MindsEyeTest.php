<?php

namespace Tests\Feature\Models;

use Illuminate\Http\Request;
use Tests\TestCase;

class MindsEyeTest extends TestCase
{
    public function test_list_returns_array()
    {
        $request = new Request();
        $result = \App\Models\MindsEye::list($request);
        $this->assertIsArray($result);
    }

    public function test_find_returns_array()
    {
        $result = \App\Models\MindsEye::find('sample-slug');
        $this->assertIsArray($result);
    }

    public function test_list_returns_array_with_data_key()
    {
        $request = new Request();
        $result = \App\Models\MindsEye::list($request);
        $this->assertIsArray($result);
        $this->assertArrayHasKey('data', $result);
    }

    public function test_find_returns_array_with_data_key()
    {
        $result = \App\Models\MindsEye::find('sample-slug');
        $this->assertIsArray($result);
        $this->assertArrayHasKey('data', $result);
    }
}
