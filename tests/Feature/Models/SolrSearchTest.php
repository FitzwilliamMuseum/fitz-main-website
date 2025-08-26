<?php

namespace Tests\Feature\Models;

use Tests\TestCase;

class SolrSearchTest extends TestCase
{
    public function test_is_solr_enabled_returns_bool()
    {
        $result = \App\Models\SolrSearch::isSolrEnabled();
        $this->assertIsBool($result);
    }

    public function test_inject_results_returns_array()
    {
        $result = \App\Models\SolrSearch::injectResults('test', 'test-type');
        $this->assertIsArray($result);
    }
}
