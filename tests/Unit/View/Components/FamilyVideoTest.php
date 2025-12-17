<?php

namespace Tests\Unit\View\Components;

use App\View\Components\familyVideo;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use Tests\CreatesApplication;

class FamilyVideoTest extends BaseTestCase
{
    use CreatesApplication;

    #[\PHPUnit\Framework\Attributes\Test]
    public function it_sets_session_property()
    {
        $session = ['id' => 1];
        $component = new familyVideo($session);
        $this->assertEquals($session, $component->session);
    }

    #[\PHPUnit\Framework\Attributes\Test]
    public function it_renders_the_correct_view()
    {
        $component = new familyVideo(['id' => 1]);
        $view = $component->render();
        $this->assertEquals('components.family-video', $view->name());
    }
}
