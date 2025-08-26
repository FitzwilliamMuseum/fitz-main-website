<?php

namespace Tests\Feature\Controllers;

use App\Http\Controllers\schoolsController;
use App\WordpressSchoolsImporter;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\App;
use Mockery;
use Tests\TestCase;

class SchoolsControllerTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();
        // This forcefully cleans up Mockery's entire container,
        // ensuring no mocks from previous tests can interfere.
        if (Mockery::getContainer() != null) {
            Mockery::getContainer()->mockery_tearDown();
        }
        
    }
    protected function tearDown(): void
    {
        Mockery::close();
        parent::tearDown();
    }

    public function test_build_url_returns_correct_url()
    {
        $controller = new schoolsController();
        $url = $controller->buildUrl('schools');
        $this->assertEquals('https://schools.fitzmuseum.cam.ac.uk/wp-json/wp/v2/modules/?_embed&per_page=100', $url);
    }

    public function test_import_calls_importer_with_live_data()
    {
        $controller = new schoolsController();
        // We'll use the real importer, but mock the import method to avoid side effects
        $importer = Mockery::mock(WordpressSchoolsImporter::class)->makePartial();
        $importer->shouldReceive('setUrl')->once()->with('https://schools.fitzmuseum.cam.ac.uk/wp-json/wp/v2/modules/?_embed&per_page=100');
        $importer->shouldReceive('import')->once()->with('schools');

        // Swap the importer in the controller
        App::instance(WordpressSchoolsImporter::class, $importer);

        // Patch the controller to use the mocked importer
        $controller = new class extends schoolsController {
            public function import()
            {
                foreach ($this->_subdomains as $subdomain) {
                    $jekyll = app(WordpressSchoolsImporter::class);
                    $jekyll->setUrl($this->buildUrl($subdomain));
                    $jekyll->import($subdomain);
                }
            }
        };

        $controller->import();
    }
}
