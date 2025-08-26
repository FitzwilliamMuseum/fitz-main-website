<?php

namespace Tests\Feature\Models;

use Tests\TestCase;

class FaqsTest extends TestCase
{
    public function test_list_returns_faqs_array()
    {
        $result = \App\Models\Faqs::list('general');
        $this->assertIsArray($result);
    }
}
