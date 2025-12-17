<?php

namespace Tests\Feature\Models;

use Tests\TestCase;

class HomePageBannersTest extends TestCase
{
    public function test_get_banner_returns_array()
    {
        $result = \App\Models\HomePageBanners::getBanner();
        $this->assertIsArray($result);
    }

    public function test_get_banner_by_id_returns_array()
    {
        $result = \App\Models\HomePageBanners::getBannerByID(1);
        $this->assertIsArray($result);
    }
}
