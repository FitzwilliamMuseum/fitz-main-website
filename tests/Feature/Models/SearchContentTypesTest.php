<?php

namespace Tests\Feature\Models;

use Tests\TestCase;

class SearchContentTypesTest extends TestCase
{
    public function test_find_returns_array()
    {
        $result = \App\Models\SearchContentTypes::find('sample-type');
        $this->assertIsArray($result);
    }
}
