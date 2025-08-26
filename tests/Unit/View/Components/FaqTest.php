<?php

namespace Tests\Unit\View\Components;

use App\View\Components\faq;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use Tests\CreatesApplication;

class FaqTest extends BaseTestCase
{
    use CreatesApplication;

    #[\PHPUnit\Framework\Attributes\Test]
    public function it_sets_faq_property()
    {
        $faq = ['q' => 'What?'];
        $component = new faq($faq);
        $this->assertEquals($faq, $component->faq);
    }

    #[\PHPUnit\Framework\Attributes\Test]
    public function it_renders_the_correct_view()
    {
        $component = new faq(['q' => 'What?']);
        $view = $component->render();
        $this->assertEquals('components.faq', $view->name());
    }
}
