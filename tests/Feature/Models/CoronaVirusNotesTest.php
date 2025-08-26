<?php

namespace Tests\Feature\Models;

use Tests\TestCase;

class CoronaVirusNotesTest extends TestCase
{
    public function test_list_returns_corona_virus_notes_array()
    {
        $result = \App\Models\CoronaVirusNotes::list();
        $this->assertIsArray($result);
    }
}
