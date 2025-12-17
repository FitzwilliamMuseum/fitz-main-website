<?php

namespace Tests\Feature\Controllers;

use App\Http\Controllers\jekyllController;
use App\Models\JekyllSites;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Mockery;

class JekyllControllerTest extends TestCase
{
    use WithFaker;

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
        $controller = new jekyllController();
        $subdomain = 'testsubdomain';
        $expected = 'https://testsubdomain.fitzmuseum.cam.ac.uk/data.json';
        $this->assertEquals($expected, $controller->buildUrl($subdomain));
    }

    public function test_import_calls_importer_for_each_subdomain()
    {
        $subdomains = ['foo', 'bar'];
        \Mockery::mock('alias:App\\Models\\JekyllSites')
            ->shouldReceive('list')
            ->andReturn($subdomains);

        $setUrlCount = 0;
        $importCount = 0;

        $mock = \Mockery::mock('overload:App\\JekyllImporter');
        $mock->shouldReceive('setUrl')->andReturnUsing(function() use (&$setUrlCount) {
            $setUrlCount++;
        });
        $mock->shouldReceive('import')->andReturnUsing(function() use (&$importCount) {
            $importCount++;
        });

        $controller = new jekyllController();
        $controller->import();

        $this->assertEquals(count($subdomains), $setUrlCount, 'setUrl should be called for each subdomain');
        $this->assertEquals(count($subdomains), $importCount, 'import should be called for each subdomain');
    }
}
