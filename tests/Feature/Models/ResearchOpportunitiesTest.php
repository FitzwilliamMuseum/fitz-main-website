<?php

namespace Tests\Feature\Models;

use Tests\TestCase;

class ResearchOpportunitiesTest extends TestCase
{
    public function test_list_returns_array()
    {
        $result = \App\Models\ResearchOpportunities::list();
        $this->assertIsArray($result);
    }

    public function test_find_returns_array()
    {
        $result = \App\Models\ResearchOpportunities::find('conservation-internships');
        $this->assertIsArray($result);
    }

    public function test_list_returns_expected_keys()
    {
        $result = \App\Models\ResearchOpportunities::list();
        $this->assertIsArray($result);
        $this->assertArrayHasKey('data', $result);
        $this->assertIsArray($result['data']);
        if (!empty($result['data'])) {
            $expectedKeys = [
                'id', 'status', 'sort', 'owner', 'created_on', 'modified_by', 'modified_on',
                'title', 'slug', 'description', 'contact_name', 'contact_email',
                'go_live', 'expires', 'hero_image', 'hero_image_alt_text', 'meta_description'
            ];
            foreach ($expectedKeys as $key) {
                $this->assertArrayHasKey($key, $result['data'][0]);
            }
        }
        $this->assertArrayHasKey('public', $result);
    }

    public function test_find_returns_expected_keys()
    {
        $result = \App\Models\ResearchOpportunities::find('conservation-internships');
        $this->assertIsArray($result);
        $this->assertArrayHasKey('data', $result);
        $this->assertIsArray($result['data']);
        if (!empty($result['data'])) {
            $expectedKeys = [
                'id', 'status', 'sort', 'owner', 'created_on', 'modified_by', 'modified_on',
                'title', 'slug', 'description', 'contact_name', 'contact_email',
                'go_live', 'expires', 'hero_image', 'hero_image_alt_text', 'meta_description'
            ];
            foreach ($expectedKeys as $key) {
                $this->assertArrayHasKey($key, $result['data'][0]);
            }
        }
        $this->assertArrayHasKey('public', $result);
    }
}
