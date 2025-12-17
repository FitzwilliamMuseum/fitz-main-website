<?php

namespace Tests\Feature\Models;

use Tests\TestCase;

class GovernanceTest extends TestCase
{
    public function test_get_governance_returns_array()
    {
        $result = \App\Models\Governance::getGovernance();
        $this->assertIsArray($result);
    }

    public function test_get_governance_result_has_data_key()
    {
        $result = \App\Models\Governance::getGovernance();
        $this->assertArrayHasKey('data', $result);
    }

    public function test_get_governance_by_type_returns_array()
    {
        $result = \App\Models\Governance::getGovernanceByType('test');
        $this->assertIsArray($result);
    }

    public function test_get_governance_by_type_result_has_data_key()
    {
        $result = \App\Models\Governance::getGovernanceByType('test');
        $this->assertArrayHasKey('data', $result);
    }
}
