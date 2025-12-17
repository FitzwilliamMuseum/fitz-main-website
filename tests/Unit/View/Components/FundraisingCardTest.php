<?php

namespace Tests\Unit\View\Components;

use App\View\Components\fundraisingCard;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use Tests\CreatesApplication;

class FundraisingCardTest extends BaseTestCase
{
    use CreatesApplication;

    #[\PHPUnit\Framework\Attributes\Test]
    public function it_sets_donate_property()
    {
        $donate = ['amount' => 100];
        $component = new fundraisingCard($donate);
        $this->assertEquals($donate, $component->donate);
    }

    #[\PHPUnit\Framework\Attributes\Test]
    public function it_renders_the_correct_view()
    {
        $component = new fundraisingCard(['amount' => 100]);
        $view = $component->render();
        $this->assertEquals('components.fundraising-card', $view->name());
    }
}
