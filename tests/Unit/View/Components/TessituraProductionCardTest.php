<?php
namespace Tests\Unit\View\Components;
use App\View\Components\tessituraProductionCard;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use Tests\CreatesApplication;
class TessituraProductionCardTest extends BaseTestCase
{
    use CreatesApplication;
    #[\PHPUnit\Framework\Attributes\Test]
    public function it_sets_production_property()
    {
        $production = ['id' => 1];
        $component = new tessituraProductionCard($production);
        $this->assertEquals($production, $component->production);
    }
    #[\PHPUnit\Framework\Attributes\Test]
    public function it_renders_the_correct_view()
    {
        $component = new tessituraProductionCard(['id' => 1]);
        $view = $component->render();
        $this->assertEquals('components.tessitura-production-card', $view->name());
    }
}
