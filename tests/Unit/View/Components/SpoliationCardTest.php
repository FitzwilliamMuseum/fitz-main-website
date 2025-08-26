<?php

namespace Tests\Unit\View\Components;

use App\View\Components\spoliationCard;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use Tests\CreatesApplication;

class SpoliationCardTest extends BaseTestCase
{
    use CreatesApplication;

    #[\PHPUnit\Framework\Attributes\Test]
    public function it_sets_claim_property()
    {
        $claim = ['case' => 'A123'];
        $component = new spoliationCard($claim);
        $this->assertEquals($claim, $component->claim);
    }

    #[\PHPUnit\Framework\Attributes\Test]
    public function it_renders_the_correct_view()
    {
        $component = new spoliationCard(['case' => 'A123']);
        $view = $component->render();
        $this->assertEquals('components.spoliation-card', $view->name());
    }
}
