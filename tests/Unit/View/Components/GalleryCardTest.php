<?php

namespace Tests\Unit\View\Components;

use App\View\Components\galleryCard;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use Tests\CreatesApplication;

class GalleryCardTest extends BaseTestCase
{
    use CreatesApplication;

    #[\PHPUnit\Framework\Attributes\Test]
    public function it_sets_properties_correctly()
    {
        $route = '/gallery';
        $params = ['id' => 1];
        $title = 'Gallery Title';
        $altTag = 'Alt Text';
        $image = ['src' => 'img.jpg'];
        $status = ['open'];
        $source = 'source';
        $component = new galleryCard($route, $params, $title, $altTag, $image, $status, $source);
        $this->assertEquals($route, $component->route);
        $this->assertEquals($params, $component->params);
        $this->assertEquals($title, $component->title);
        $this->assertEquals($altTag, $component->altTag);
        $this->assertEquals($image, $component->image);
        $this->assertEquals($status, $component->status);
        $this->assertEquals($source, $component->source);
    }

    #[\PHPUnit\Framework\Attributes\Test]
    public function it_renders_the_correct_view()
    {
        $component = new galleryCard('/gallery', ['id' => 1], 'Gallery Title', 'Alt Text', ['src' => 'img.jpg'], ['open'], 'source');
        $view = $component->render();
        $this->assertEquals('components.gallery-card', $view->name());
    }
}
