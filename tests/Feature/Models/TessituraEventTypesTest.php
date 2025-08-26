<?php

namespace Tests\Feature\Models;

use Tests\TestCase;

class TessituraEventTypesTest extends TestCase
{
    public function test_list_ids_returns_array()
    {
        $result = \App\Models\TessituraEventTypes::listIds();
        $this->assertIsArray($result);
    }

    public function test_event_type_match_returns_array()
    {
        $result = \App\Models\TessituraEventTypes::eventTypeMatch();
        $this->assertIsArray($result);
    }
}
