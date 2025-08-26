<?php

namespace Tests\Unit\View\Components;

use App\View\Components\learningFileCard;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use Tests\CreatesApplication;

class LearningFileCardTest extends BaseTestCase
{
    use CreatesApplication;

    #[\PHPUnit\Framework\Attributes\Test]
    public function it_sets_file_property()
    {
        $file = ['name' => 'file.pdf'];
        $component = new learningFileCard($file);
        $this->assertEquals($file, $component->file);
    }

    #[\PHPUnit\Framework\Attributes\Test]
    public function it_renders_the_correct_view()
    {
        $component = new learningFileCard(['name' => 'file.pdf']);
        $view = $component->render();
        $this->assertEquals('components.learning-file-card', $view->name());
    }
}
