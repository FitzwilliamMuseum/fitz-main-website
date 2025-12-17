<?php

namespace Tests\Feature\Models;

use Tests\TestCase;

class HighlightPagesTest extends TestCase
{
    public function test_list_returns_array()
    {
        $result = \App\Models\HighlightPages::list('sample-slug', 'sample-section');
        $this->assertIsArray($result);
    }

    public function test_get_contexts_returns_array()
    {
        $result = \App\Models\HighlightPages::getContexts();
        $this->assertIsArray($result);
    }

    public function test_get_by_context_returns_array()
    {
        $result = \App\Models\HighlightPages::getByContext();
        $this->assertIsArray($result);
    }

    public function test_get_by_section_returns_array()
    {
        $result = \App\Models\HighlightPages::getBySection('sample-section');
        $this->assertIsArray($result);
    }
}
