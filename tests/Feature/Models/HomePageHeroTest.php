<?php

namespace Tests\Feature\Models;

use Tests\TestCase;

class HomePageHeroTest extends TestCase
{
    public function test_get_hero_data_returns_array()
    {
        $result = \App\Models\HomePageHero::getHeroData();
        $this->assertIsArray($result);
    }
}
