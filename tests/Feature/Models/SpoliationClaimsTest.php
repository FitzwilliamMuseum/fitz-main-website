<?php

namespace Tests\Feature\Models;

use Illuminate\Http\Request;
use Tests\TestCase;

class SpoliationClaimsTest extends TestCase
{
    public function test_find_returns_array()
    {
        $result = \App\Models\SpoliationClaims::find('sample-priref');
        $this->assertIsArray($result);
    }

    /**
     * @deprecated Skipped due to deprecation.
     */
    public function test_list_returns_paginator()
    {
        $this->markTestSkipped('Deprecated: Skipped due to deprecation.');
    }
}
