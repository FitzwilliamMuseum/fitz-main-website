<?php

namespace Tests\Unit\View\Components;

use App\View\Components\exhibitionFiles;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use Tests\CreatesApplication;

class ExhibitionFilesTest extends BaseTestCase
{
    use CreatesApplication;

    #[\PHPUnit\Framework\Attributes\Test]
    public function it_sets_files_property()
    {
        $files = [['file' => 'a.pdf']];
        $component = new exhibitionFiles($files);
        $this->assertEquals($files, $component->files);
    }

    #[\PHPUnit\Framework\Attributes\Test]
    public function it_renders_the_correct_view()
    {
        $component = new exhibitionFiles([['file' => 'a.pdf']]);
        $view = $component->render();
        $this->assertEquals('components.exhibition-files', $view->name());
    }
}
