<?php

namespace Tests\Feature\Models;

use Tests\TestCase;

class FindMoreLikeThisTest extends TestCase
{
    public function test_find_returns_array()
    {
        $result = \App\Models\FindMoreLikeThis::find('luke-syson', 'news');
        $this->assertIsArray($result);
    }
}
