<?php

namespace Tests\Feature\Models;

use Tests\TestCase;

class LabelsTest extends TestCase
{
    
    
    protected function setUp(): void
    {
        parent::setUp();
        $this->slug = 'teapot-with-cane-handle';
    }

    public function test_list_returns_labels_array()
    {
        $result = \App\Models\Labels::list('case-1');
        $this->assertIsArray($result);
    }

    public function test_find_returns_label_array()
    {
        $result = \App\Models\Labels::find($this->slug);
        $this->assertIsArray($result);
    }
}
