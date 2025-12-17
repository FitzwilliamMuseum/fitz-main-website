<?php

namespace Tests\Feature\Models;

use Tests\TestCase;

class PressTermsTest extends TestCase
{
    public function test_list_returns_array()
    {
        $result = \App\Models\PressTerms::list();
        $this->assertIsArray($result);
    }
}
