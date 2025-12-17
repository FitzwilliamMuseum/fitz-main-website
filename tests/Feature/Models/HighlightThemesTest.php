<?php

namespace Tests\Feature\Models;

use Tests\TestCase;

class HighlightThemesTest extends TestCase
{
    public function test_list_returns_highlight_themes_array()
    {
        $result = \App\Models\HighlightThemes::list();
        $this->assertIsArray($result);
        $this->assertArrayHasKey('data', $result);
    }

    public function test_find_returns_highlight_theme_array()
    {
        $result = \App\Models\HighlightThemes::find('places');
        $this->assertIsArray($result);
    }

    public function test_get_details_returns_array()
    {
        $result = \App\Models\HighlightThemes::getDetails('places');
        $this->assertIsArray($result);
    }

    public function test_get_themes_returns_array()
    {
        $result = \App\Models\HighlightThemes::getThemes();
        $this->assertIsArray($result);
    }
}
