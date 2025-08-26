<?php

namespace Tests\Feature\Models;

use Tests\TestCase;

class HomePageTest extends TestCase
{
    public function test_find_returns_home_page_array()
    {
        $result = \App\Models\HomePage::find();
        $this->assertIsArray($result);
    }

    public function test_return_third_row_returns_array()
    {
        $result = \App\Models\HomePage::returnThirdRow();
        $this->assertIsArray($result);
    }

    public function test_return_third_row_has_data_key()
    {
        $result = \App\Models\HomePage::returnThirdRow();
        $this->assertArrayHasKey('data', $result);
    }

    public function test_return_fourth_row_returns_array()
    {
        $result = \App\Models\HomePage::returnFourthRow();
        $this->assertIsArray($result);
    }

    public function test_return_fourth_row_has_data_key()
    {
        $result = \App\Models\HomePage::returnFourthRow();
        $this->assertArrayHasKey('data', $result);
    }
}
