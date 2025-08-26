<?php

namespace Tests\Feature\Models;

use Illuminate\Http\Request;
use Tests\TestCase;

class PodcastingTest extends TestCase
{
    public function test_list_returns_array()
    {
        $request = new Request(['page' => 1]);
        $result = \App\Models\Podcasting::list($request);
        $this->assertIsArray($result);
    }

    public function test_find_returns_array()
    {
        $result = \App\Models\Podcasting::find('sample-slug');
        $this->assertIsArray($result);
    }
}
