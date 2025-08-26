<?php

namespace Tests\Feature\Models;

use App\Models\JekyllSites;
use Tests\TestCase;
use PHPUnit\Framework\Attributes\RunTestsInSeparateProcesses;
use PHPUnit\Framework\Attributes\PreserveGlobalState;

#[RunTestsInSeparateProcesses]
#[PreserveGlobalState(false)] 
class JekyllSitesTest extends TestCase
{
    public function test_list_returns_array()
    {
        $result = JekyllSites::list();
        $this->assertIsArray($result);
    }

    public function test_list_contains_only_strings()
    {
        $result = JekyllSites::list();

        foreach ($result as $subdomain) {
            $this->assertIsString($subdomain);
        }
    }
}
