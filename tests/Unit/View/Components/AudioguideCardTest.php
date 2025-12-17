<?php

namespace Tests\Unit\View\Components;

use App\View\Components\audioguideCard;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use Tests\CreatesApplication;

class AudioguideCardTest extends BaseTestCase
{
    use CreatesApplication;

    #[\PHPUnit\Framework\Attributes\Test]
    public function it_sets_properties_correctly()
    {
        $route = '/audio';
        $params = ['id' => 1];
        $title = 'Audio Title';
        $altTag = 'Alt Text';
        $image = ['src' => 'img.jpg'];
        $stop = 5;
        $component = new audioguideCard($route, $params, $title, $altTag, $image, $stop);
        $this->assertEquals($route, $component->route);
        $this->assertEquals($params, $component->params);
        $this->assertEquals($title, $component->title);
        $this->assertEquals($altTag, $component->altTag);
        $this->assertEquals($image, $component->image);
        $this->assertEquals($stop, $component->stop);
    }

    #[\PHPUnit\Framework\Attributes\Test]
    public function it_renders_the_correct_view()
    {
        $component = new audioguideCard('/audio', ['id' => 1], 'Audio Title', 'Alt Text', ['src' => 'img.jpg'], 5);
        $view = $component->render();
        $this->assertEquals('components.audioguide-card', $view->name());
    }
}
