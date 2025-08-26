<?php

namespace Tests\Unit\View\Components;

use App\View\Components\exhibitionThanks;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use Tests\CreatesApplication;

class ExhibitionThanksTest extends BaseTestCase
{
    use CreatesApplication;

    #[\PHPUnit\Framework\Attributes\Test]
    public function it_sets_exhibition_property()
    {
        $exhibition = ['id' => 1];
        $component = new exhibitionThanks($exhibition);
        $this->assertEquals($exhibition, $component->exhibition);
    }

    #[\PHPUnit\Framework\Attributes\Test]
    public function it_renders_the_correct_view()
    {
        $component = new exhibitionThanks(['id' => 1]);
        $view = $component->render();
        $this->assertEquals('components.exhibition-thanks', $view->name());
    }
}
