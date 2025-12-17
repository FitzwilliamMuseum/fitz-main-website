<?php
namespace Tests\Unit\View\Components;
use App\View\Components\instagramCard;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use Tests\CreatesApplication;
class InstagramCardTest extends BaseTestCase
{
    use CreatesApplication;
    #[\PHPUnit\Framework\Attributes\Test]
    public function it_sets_instagram_property()
    {
        $instagram = ['post' => 'abc'];
        $component = new instagramCard($instagram);
        $this->assertEquals($instagram, $component->instagram);
    }
    #[\PHPUnit\Framework\Attributes\Test]
    public function it_renders_the_correct_view()
    {
        $component = new instagramCard(['post' => 'abc']);
        $view = $component->render();
        $this->assertEquals('components.instagram-card', $view->name());
    }
}
