<?php

namespace Tests\Unit\View\Components;

use App\View\Components\ttnLabel;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use Tests\CreatesApplication;

class TtnLabelTest extends BaseTestCase
{
    use CreatesApplication;

    #[\PHPUnit\Framework\Attributes\Test]
    public function it_sets_label_property()
    {
        $label = ['text' => 'Label'];
        $component = new ttnLabel($label);
        $this->assertEquals($label, $component->label);
    }

    #[\PHPUnit\Framework\Attributes\Test]
    public function it_renders_the_correct_view()
    {
        $component = new ttnLabel(['text' => 'Label']);
        $view = $component->render();
        $this->assertEquals('components.ttn-label', $view->name());
    }
}
