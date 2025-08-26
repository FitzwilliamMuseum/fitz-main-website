<?php

namespace Tests\Feature\Models;

use Tests\TestCase;
use App\Models\AffiliateResearchers;

class AffiliateResearchersTest extends TestCase
{
    public function test_list_returns_array()
    {
        $result = AffiliateResearchers::list();
        $this->assertIsArray($result);
    }

    public function test_list_has_data_key()
    {
        $result = AffiliateResearchers::list();
        $this->assertArrayHasKey('data', $result);
    }

    public function test_find_returns_array()
    {
        $list = AffiliateResearchers::list();
        if (empty($list['data'])) {
            $this->markTestSkipped('No affiliate researchers found in the API.');
        }
        $first = collect($list['data'])->first();
        $result = AffiliateResearchers::find($first['slug']);
        $this->assertIsArray($result);
    }

    public function test_find_has_data_key()
    {
        $list = AffiliateResearchers::list();
        if (empty($list['data'])) {
            $this->markTestSkipped('No affiliate researchers found in the API.');
        }
        $first = collect($list['data'])->first();
        $result = AffiliateResearchers::find($first['slug']);
        $this->assertArrayHasKey('data', $result);
    }

    public function test_find_by_department_returns_array()
    {
        $list = AffiliateResearchers::list();
        if (empty($list['data'])) {
            $this->markTestSkipped('No affiliate researchers found in the API.');
        }
        $first = collect($list['data'])->first();
        if (empty($first['departments_affiliated']['data'])) {
            $this->markTestSkipped('No departments affiliated with the first researcher.');
        }
        $department = collect($first['departments_affiliated']['data'])->first();
        $result = AffiliateResearchers::findByDepartment($department['id']);
        $this->assertIsArray($result);
    }

    public function test_find_by_department_has_data_key()
    {
        $list = AffiliateResearchers::list();
        if (empty($list['data'])) {
            $this->markTestSkipped('No affiliate researchers found in the API.');
        }
        $first = collect($list['data'])->first();
        if (empty($first['departments_affiliated']['data'])) {
            $this->markTestSkipped('No departments affiliated with the first researcher.');
        }
        $department = collect($first['departments_affiliated']['data'])->first();
        $result = AffiliateResearchers::findByDepartment($department['id']);
        $this->assertArrayHasKey('data', $result);
    }
}
