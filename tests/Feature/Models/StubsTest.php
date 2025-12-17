<?php

namespace Tests\Feature\Models;

use Tests\TestCase;

class StubsTest extends TestCase
{
    public function test_get_page_returns_array()
    {
        $result = \App\Models\Stubs::getPage('sample-section', 'sample-slug');
        $this->assertIsArray($result);
    }

    public function test_find_by_slug_returns_array()
    {
        $result = \App\Models\Stubs::findBySlug('sample-slug');
        $this->assertIsArray($result);
    }

    public function test_find_by_subsection_returns_array()
    {
        $result = \App\Models\Stubs::findBySubSection('sample-subsection');
        $this->assertIsArray($result);
    }

    public function test_get_landing_returns_array()
    {
        $result = \App\Models\Stubs::getLanding('sample-section');
        $this->assertIsArray($result);
    }

    public function test_get_landing_by_slug_returns_array()
    {
        $result = \App\Models\Stubs::getLandingBySlug('sample-section', 'sample-slug');
        $this->assertIsArray($result);
    }

    public function test_get_associated_returns_array()
    {
        $result = \App\Models\Stubs::getAssociated('sample-section');
        $this->assertIsArray($result);
    }

    public function test_get_highlight_page_returns_array_or_null()
    {
        $result = \App\Models\Stubs::getHighlightPage(1);
        $this->assertTrue(is_array($result) || is_null($result));
    }

    public function test_visit_us_associated_returns_array()
    {
        $result = \App\Models\Stubs::visitUsAssociated();
        $this->assertIsArray($result);
    }

    public function test_visit_us_landing_returns_array()
    {
        $result = \App\Models\Stubs::visitUsLanding();
        $this->assertIsArray($result);
    }

    public function test_get_landing_by_section_returns_array()
    {
        $result = \App\Models\Stubs::getLandingBySection('sample-section');
        $this->assertIsArray($result);
    }
}
