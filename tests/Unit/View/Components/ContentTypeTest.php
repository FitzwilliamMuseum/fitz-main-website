<?php

namespace Tests\Unit\View\Components;

use App\View\Components\contentType;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use Tests\CreatesApplication;

class ContentTypeTest extends BaseTestCase
{
    use CreatesApplication;

    #[\PHPUnit\Framework\Attributes\Test]
    public function it_sets_display_property()
    {
        $display = 'Display Name';
        $component = new contentType($display);
        $this->assertEquals($display, $component->display);
    }

    #[\PHPUnit\Framework\Attributes\Test]
    public function it_renders_the_correct_view()
    {
        $component = new contentType('Display Name');
        $view = $component->render();
        $this->assertEquals('components.content-type', $view->name());
    }
}
