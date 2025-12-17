<?php
namespace Tests\Unit\View\Components;
use App\View\Components\tessituraProductionDetailsCard;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use Tests\CreatesApplication;
class TessituraProductionDetailsCardTest extends BaseTestCase
{
    use CreatesApplication;
    #[\PHPUnit\Framework\Attributes\Test]
    public function it_sets_production_property()
    {
        $production = ['id' => 1];
        $component = new tessituraProductionDetailsCard($production);
        $this->assertEquals($production, $component->production);
    }
    #[\PHPUnit\Framework\Attributes\Test]
    public function it_renders_the_correct_view()
    {
        $component = new tessituraProductionDetailsCard(['id' => 1]);
        $view = $component->render();
        $this->assertEquals('components.tessitura-production-details-card', $view->name());
    }
}
