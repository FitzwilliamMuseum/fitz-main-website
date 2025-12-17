<?php
namespace Tests\Unit\View\Components;
use App\View\Components\staticImageCard;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use Tests\CreatesApplication;
class StaticImageCardTest extends BaseTestCase
{
    use CreatesApplication;
    #[\PHPUnit\Framework\Attributes\Test]
    public function it_sets_properties_correctly()
    {
        $image = 'img.jpg';
        $route = '/img';
        $alt = 'Alt';
        $title = 'Title';
        $params = ['id' => 1];
        $component = new staticImageCard($image, $route, $alt, $title, $params);
        $this->assertEquals($image, $component->image);
        $this->assertEquals($route, $component->route);
        $this->assertEquals($alt, $component->alt);
        $this->assertEquals($title, $component->title);
        $this->assertEquals($params, $component->params);
    }
    #[\PHPUnit\Framework\Attributes\Test]
    public function it_renders_the_correct_view()
    {
        $component = new staticImageCard('img.jpg', '/img', 'Alt', 'Title', ['id' => 1]);
        $view = $component->render();
        $this->assertEquals('components.static-image-card', $view->name());
    }
}
