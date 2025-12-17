<?php

namespace Tests\Feature\Models;

use Tests\TestCase;

class GalleryFamilyActivitiesTest extends TestCase
{
    public function test_list_returns_array()
    {
        $result = \App\Models\GalleryFamilyActivities::list();
        $this->assertIsArray($result);
    }

    public function test_list_returns_array_with_data_key()
    {
        $result = \App\Models\GalleryFamilyActivities::list();
        $this->assertArrayHasKey('data', $result);
    }
}
