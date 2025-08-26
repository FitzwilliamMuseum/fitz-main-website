<?php

namespace Tests\Feature\Models;

use Tests\TestCase;

class HighlightPeriodsTest extends TestCase
{
    public function test_find_returns_highlight_periods_array()
    {
        $result = \App\Models\HighlightPeriods::find('sample-period');
        $this->assertIsArray($result);
    }
}
