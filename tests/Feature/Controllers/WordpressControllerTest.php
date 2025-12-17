<?php

namespace Tests\Feature\Controllers;

use App\Http\Controllers\wordpressController;
use App\WordpressImporter;
use Illuminate\Support\Facades\App;
use Mockery;
use Tests\TestCase;

class WordpressControllerTest extends TestCase
{
    public function test_build_url_returns_correct_url()
    {
        $controller = new wordpressController();
        $url = $controller->buildUrl('conservation');
        $this->assertEquals('https://conservation.fitzmuseum.cam.ac.uk/wp-json/wp/v2/posts/?_embed&per_page=100', $url);
    }

    public function test_import_calls_importer_with_live_data()
    {
        $controller = new wordpressController();
        $importer = Mockery::mock(WordpressImporter::class)->makePartial();
        $importer->shouldReceive('setUrl')->once()->with('https://conservation.fitzmuseum.cam.ac.uk/wp-json/wp/v2/posts/?_embed&per_page=100');
        $importer->shouldReceive('import')->once()->with('conservation');

        App::instance(WordpressImporter::class, $importer);

        $controller = new class extends wordpressController {
            public function import()
            {
                foreach ($this->_subdomains as $subdomain) {
                    $jekyll = app(WordpressImporter::class);
                    $jekyll->setUrl($this->buildUrl($subdomain));
                    $jekyll->import($subdomain);
                }
            }
        };

        $controller->import();
    }
}
