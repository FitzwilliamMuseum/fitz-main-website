<?php
namespace Tests\Unit\View\Components;
use App\View\Components\ttnLabels;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use Tests\CreatesApplication;
class TtnLabelsTest extends BaseTestCase
{
    use CreatesApplication;
    #[\PHPUnit\Framework\Attributes\Test]
    public function it_sets_labels_property()
    {
        $labels = [['label' => 'A']];
        $component = new ttnLabels($labels);
        $this->assertEquals($labels, $component->labels);
    }
    #[\PHPUnit\Framework\Attributes\Test]
    public function it_renders_the_correct_view()
    {
        $component = new ttnLabels([['label' => 'A']]);
        $view = $component->render();
        $this->assertEquals('components.ttn-labels', $view->name());
    }
}
