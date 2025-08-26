<?php
namespace Tests\Unit\View\Components;
use App\View\Components\homePageBanner;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use Tests\CreatesApplication;
class HomePageBannerTest extends BaseTestCase
{
    use CreatesApplication;
    #[\PHPUnit\Framework\Attributes\Test]
    public function it_sets_banners_property()
    {
        $banners = [['img' => 'banner.jpg']];
        $component = new homePageBanner($banners);
        $this->assertEquals($banners, $component->banners);
    }
    #[\PHPUnit\Framework\Attributes\Test]
    public function it_renders_the_correct_view()
    {
        $component = new homePageBanner([['img' => 'banner.jpg']]);
        $view = $component->render();
        $this->assertEquals('components.home-page-banner', $view->name());
    }
}
