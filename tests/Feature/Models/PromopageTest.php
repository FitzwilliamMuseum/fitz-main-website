<?php

namespace Tests\Feature\Models;

use Tests\TestCase;

class PromopageTest extends TestCase
{
    public function test_get_subpage_returns_array()
    {
        $result = \App\Models\Promopage::getSubpage('museum-late-paris-1924');
        $this->assertIsArray($result);
    }
}
