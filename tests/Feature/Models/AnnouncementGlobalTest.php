<?php

namespace Tests\Feature\Models;

use Tests\TestCase;

class AnnouncementGlobalTest extends TestCase
{
    public function test_list_returns_array()
    {
        $result = \App\Models\AnnouncementGlobal::list();
        $this->assertIsArray($result);
    }

    public function test_list_array_has_data_key()
    {
        $result = \App\Models\AnnouncementGlobal::list();
        $this->assertArrayHasKey('data', $result);
    }
}
