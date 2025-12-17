<?php
namespace Tests\Unit\View\Components;
use App\View\Components\visitUsStaticCard;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use Tests\CreatesApplication;
class VisitUsStaticCardTest extends BaseTestCase
{
    use CreatesApplication;
    #[\PHPUnit\Framework\Attributes\Test]
    public function it_sets_properties_correctly()
    {
        $image = 'img.jpg';
        $route = '/visit';
        $params = ['id' => 1];
        $alt = 'Alt';
        $title = 'Title';
        $colWidth = 'col-6';
        $component = new visitUsStaticCard($image, $route, $params, $alt, $title, $colWidth);
        $this->assertEquals($image, $component->image);
        $this->assertEquals($route, $component->route);
        $this->assertEquals($params, $component->params);
        $this->assertEquals($alt, $component->alt);
        $this->assertEquals($title, $component->title);
        $this->assertEquals($colWidth, $component->colWidth);
    }
    #[\PHPUnit\Framework\Attributes\Test]
    public function it_renders_the_correct_view()
    {
        $component = new visitUsStaticCard('img.jpg', '/visit', ['id' => 1], 'Alt', 'Title', 'col-6');
        $view = $component->render();
        $this->assertEquals('components.visit-us-static-card', $view->name());
    }
}
