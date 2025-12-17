<?php

namespace Tests\Feature\Models;

use Tests\TestCase;

class FloorPlansTest extends TestCase
{
    public function test_list_returns_chunked_floorplans_array()
    {
        $result = \App\Models\FloorPlans::list();
        $this->assertIsArray($result);
    }
}
