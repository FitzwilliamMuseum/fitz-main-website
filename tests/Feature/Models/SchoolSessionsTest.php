<?php

namespace Tests\Feature\Models;

use Tests\TestCase;

class SchoolSessionsTest extends TestCase
{
    public function test_list_returns_array()
    {
        $result = \App\Models\SchoolSessions::list();
        $this->assertIsArray($result);
    }

    public function test_find_returns_array()
    {
        $result = \App\Models\SchoolSessions::find('sample-slug');
        $this->assertIsArray($result);
    }
}
