<?php

namespace Tests\Feature\Models;

use Tests\TestCase;

class TessituraFacilitiesTest extends TestCase
{
    public function test_list_ids_returns_array()
    {
        $result = \App\Models\TessituraFacilities::listIds();
        $this->assertIsArray($result);
    }
}
