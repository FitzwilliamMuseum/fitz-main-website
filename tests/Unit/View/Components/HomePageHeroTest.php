<?php
namespace Tests\Unit\View\Components;
use App\View\Components\homePageHero;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use Tests\CreatesApplication;
class HomePageHeroTest extends BaseTestCase
{
    use CreatesApplication;
    #[\PHPUnit\Framework\Attributes\Test]
    public function it_sets_hero_property()
    {
        $hero = ['img' => 'hero.jpg'];
        $component = new homePageHero($hero);
        $this->assertEquals($hero, $component->hero);
    }
    #[\PHPUnit\Framework\Attributes\Test]
    public function it_renders_the_correct_view()
    {
        $component = new homePageHero(['img' => 'hero.jpg']);
        $view = $component->render();
        $this->assertEquals('components.home-page-hero', $view->name());
    }
}
