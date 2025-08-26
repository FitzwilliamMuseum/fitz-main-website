<?php

namespace Tests\Unit\View\Components;

use App\View\Components\floorPlans;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use Tests\CreatesApplication;

class FloorPlansTest extends BaseTestCase
{
    use CreatesApplication;

    #[\PHPUnit\Framework\Attributes\Test]
    public function it_sets_floorplans_property()
    {
        $floorplans = [['level' => 1], ['level' => 2]];
        $component = new floorPlans($floorplans);
        $this->assertEquals($floorplans, $component->floorplans);
    }

    #[\PHPUnit\Framework\Attributes\Test]
    public function it_renders_the_correct_view()
    {
        $component = new floorPlans([['level' => 1]]);
        $view = $component->render();
        $this->assertEquals('components.floor-plans', $view->name());
    }
}
