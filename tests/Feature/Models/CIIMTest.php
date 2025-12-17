<?php

namespace Tests\Feature\Models;


use App\Models\CIIM;
use Tests\TestCase;

class CIIMTest extends TestCase
{
    public function test_find_by_prirefs_returns_array()
    {
        $result = CIIM::findByPriRefs('23427'); // Use a valid priref if possible
        $this->assertIsArray($result);
    }

    public function test_find_by_exhibition_returns_array_or_null()
    {
        $result = CIIM::findByExhibition('1'); // Use a valid exhibition ID if possible
        $this->assertTrue(is_array($result) || is_null($result));
    }

    public function test_find_by_accession_returns_array()
    {
        $result = CIIM::findByAccession('PD.567-1973'); // Use a valid accession if possible
        $this->assertIsArray($result);
    }
}
