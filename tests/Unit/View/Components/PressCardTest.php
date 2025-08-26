<?php
namespace Tests\Unit\View\Components;
use App\View\Components\pressCard;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use Tests\CreatesApplication;
class PressCardTest extends BaseTestCase
{
    use CreatesApplication;
    #[\PHPUnit\Framework\Attributes\Test]
    public function it_sets_release_property()
    {
        $release = ['title' => 'Press'];
        $component = new pressCard($release);
        $this->assertEquals($release, $component->release);
    }
    #[\PHPUnit\Framework\Attributes\Test]
    public function it_renders_the_correct_view()
    {
        $component = new pressCard(['title' => 'Press']);
        $view = $component->render();
        $this->assertEquals('components.press-card', $view->name());
    }
}
