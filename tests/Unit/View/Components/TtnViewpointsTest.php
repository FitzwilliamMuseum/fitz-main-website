<?php
namespace Tests\Unit\View\Components;
use App\View\Components\ttnViewpoints;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use Tests\CreatesApplication;
class TtnViewpointsTest extends BaseTestCase
{
    use CreatesApplication;
    #[\PHPUnit\Framework\Attributes\Test]
    public function it_sets_viewpoint_property()
    {
        $viewpoint = ['id' => 1];
        $component = new ttnViewpoints($viewpoint);
        $this->assertEquals($viewpoint, $component->viewpoint);
    }
    #[\PHPUnit\Framework\Attributes\Test]
    public function it_renders_the_correct_view()
    {
        $component = new ttnViewpoints(['id' => 1]);
        $view = $component->render();
        $this->assertEquals('components.ttn-viewpoints', $view->name());
    }
}
