<?php

namespace Tests\Feature\Models;

use Tests\TestCase;

class LearningPagesTest extends TestCase
{
    public function test_filter_by_resource_returns_array()
    {
        $result = \App\Models\LearningPages::filterByResource('Fact Sheets');
        $this->assertIsArray($result);
    }

    public function test_filter_by_resource_not_equal_returns_array()
    {
        $result = \App\Models\LearningPages::filterByResourceNotEqual('Fact Sheets');
        $this->assertIsArray($result);
    }
    public function test_filter_by_slug_returns_array()
    {
        $result = \App\Models\LearningPages::filterBySlug('ancient-egyptians');
        $this->assertIsArray($result);
    }

    public function test_filter_by_resource_returns_data_key()
    {
        $result = \App\Models\LearningPages::filterByResource('Fact Sheets');
        $this->assertIsArray($result);
        $this->assertArrayHasKey('data', $result);
    }

    public function test_filter_by_resource_not_equal_returns_data_key()
    {
        $result = \App\Models\LearningPages::filterByResourceNotEqual('Fact Sheets');
        $this->assertIsArray($result);
        $this->assertArrayHasKey('data', $result);
    }

    public function test_filter_by_slug_returns_data_key()
    {
        $result = \App\Models\LearningPages::filterBySlug('ancient-egyptians');
        $this->assertIsArray($result);
        $this->assertArrayHasKey('data', $result);
    }
}
