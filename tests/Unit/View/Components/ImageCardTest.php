<?php
namespace Tests\Unit\View\Components;
use App\View\Components\imageCard;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use Tests\CreatesApplication;
class ImageCardTest extends BaseTestCase
{
    use CreatesApplication;
    #[\PHPUnit\Framework\Attributes\Test]
    public function it_sets_properties_correctly()
    {
        $route = '/img';
        $params = ['id' => 1];
        $title = 'Image';
        $altTag = 'Alt';
        $image = ['src' => 'img.jpg'];
        $component = new imageCard($route, $params, $title, $altTag, $image);
        $this->assertEquals($route, $component->route);
        $this->assertEquals($params, $component->params);
        $this->assertEquals($title, $component->title);
        $this->assertEquals($altTag, $component->altTag);
        $this->assertEquals($image, $component->image);
    }
    #[\PHPUnit\Framework\Attributes\Test]
    public function it_renders_the_correct_view()
    {
        $component = new imageCard('/img', ['id' => 1], 'Image', 'Alt', ['src' => 'img.jpg']);
        $view = $component->render();
        $this->assertEquals('components.image-card', $view->name());
    }
}
