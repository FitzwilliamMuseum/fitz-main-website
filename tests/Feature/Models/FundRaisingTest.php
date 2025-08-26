<?php

namespace Tests\Feature\Models;

use Tests\TestCase;

class FundRaisingTest extends TestCase
{
    public function test_list_returns_array()
    {
        $result = \App\Models\FundRaising::list();
        $this->assertIsArray($result);
    }

    public function test_list_returns_array_has_data_key()
    {
        $result = \App\Models\FundRaising::list();
        $this->assertArrayHasKey('data', $result);
    }

    public function test_list_with_limit_returns_array()
    {
        $result = \App\Models\FundRaising::list(5);
        $this->assertIsArray($result);
    }

    public function test_list_with_limit_returns_array_has_data_key()
    {
        $result = \App\Models\FundRaising::list(5);
        $this->assertArrayHasKey('data', $result);
    }
}
