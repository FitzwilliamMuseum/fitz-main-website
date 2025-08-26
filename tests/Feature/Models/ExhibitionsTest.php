<?php

namespace Tests\Feature\Models;

use Tests\TestCase;

class ExhibitionsTest extends TestCase
{
    public function test_list_returns_array()
    {
        $result = \App\Models\Exhibitions::list();
        $this->assertIsArray($result);
    }

    public function test_list_returns_array_has_data_key()
    {
        $result = \App\Models\Exhibitions::list();
        $this->assertArrayHasKey('data', $result);
    }

    public function test_list_future_returns_array()
    {
        $result = \App\Models\Exhibitions::listFuture();
        $this->assertIsArray($result);
    }

    public function test_list_future_returns_array_has_data_key()
    {
        $result = \App\Models\Exhibitions::listFuture();
        $this->assertArrayHasKey('data', $result);
    }

    public function test_list_home_returns_array()
    {
        $result = \App\Models\Exhibitions::listHome();
        $this->assertIsArray($result);
    }

    public function test_list_home_returns_array_has_data_key()
    {
        $result = \App\Models\Exhibitions::listHome();
        $this->assertArrayHasKey('data', $result);
    }

    public function test_tile_visit_returns_array()
    {
        $result = \App\Models\Exhibitions::tileVisit();
        $this->assertIsArray($result);
    }



    public function test_tile_display_returns_array()
    {
        $result = \App\Models\Exhibitions::tileDisplay();
        $this->assertIsArray($result);
    }



    public function test_archive_returns_array()
    {
        $result = \App\Models\Exhibitions::archive();
        $this->assertIsArray($result);
    }

    public function test_archive_returns_array_has_data_key()
    {
        $result = \App\Models\Exhibitions::archive();
        $this->assertArrayHasKey('data', $result);
    }

    /** Using archived results due to changes made by FM staff to make this test run **/
    public function test_find_returns_exhibition_by_slug_is_array()
    {
        $list = \App\Models\Exhibitions::list('archived', '-id', 'exhibition', 10);
        if (empty($list['data'])) {
            $this->markTestSkipped('No exhibitions found in the API.');
        }
       
        $first = collect($list['data'])->first();
        $result = \App\Models\Exhibitions::find($first['slug']);
        $this->assertIsArray($result);
    }
    /** Using archived results due to changes made by FM staff to make this test run **/
    public function test_find_returns_exhibition_by_slug_has_data_key()
    {
        $list = \App\Models\Exhibitions::list('archived', '-id', 'exhibition', 10);
        if (empty($list['data'])) {
            $this->markTestSkipped('No exhibitions found in the API.');
        }
        $first = collect($list['data'])->first();
        $result = \App\Models\Exhibitions::find($first['slug']);
        $this->assertArrayHasKey('data', $result);
    }

    public function test_immunity_returns_array()
    {
        $result = \App\Models\Exhibitions::immunity();
        $this->assertIsArray($result);
    }

    public function test_immunity_returns_array_has_data_key()
    {
        $result = \App\Models\Exhibitions::immunity();
        $this->assertArrayHasKey('data', $result);
    }

    public function test_loan_immunity_returns_array()
    {
        $result = \App\Models\Exhibitions::loanImmunity();
        $this->assertIsArray($result);
    }

    public function test_loan_immunity_returns_array_has_data_key()
    {
        $result = \App\Models\Exhibitions::loanImmunity();
        $this->assertArrayHasKey('data', $result);
    }

    public function test_find_by_externals_returns_array()
    {
        $result = \App\Models\Exhibitions::findByExternals(1);
        $this->assertIsArray($result);
    }

    // public function test_find_by_externals_returns_array_has_data_key()
    // {
    //     $result = \App\Models\Exhibitions::findByExternals(9);
    //     dd($result);
    //     $this->assertArrayHasKey('data', $result);
    // }
}
