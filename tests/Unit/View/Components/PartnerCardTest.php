<?php
namespace Tests\Unit\View\Components;
use App\View\Components\partnerCard;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use Tests\CreatesApplication;
class PartnerCardTest extends BaseTestCase
{
    use CreatesApplication;
    #[\PHPUnit\Framework\Attributes\Test]
    public function it_sets_properties_correctly()
    {
        $title = 'Partner';
        $altTag = 'Alt';
        $image = ['src' => 'img.jpg'];
        $url = 'https://example.com';
        $subtitle = 'Subtitle';
        $component = new partnerCard($title, $altTag, $image, $url, $subtitle);
        $this->assertEquals($title, $component->title);
        $this->assertEquals($altTag, $component->altTag);
        $this->assertEquals($image, $component->image);
        $this->assertEquals($url, $component->url);
        $this->assertEquals($subtitle, $component->subtitle);
    }
    #[\PHPUnit\Framework\Attributes\Test]
    public function it_renders_the_correct_view()
    {
        $component = new partnerCard('Partner', 'Alt', ['src' => 'img.jpg'], 'https://example.com', 'Subtitle');
        $view = $component->render();
        $this->assertEquals('components.partner-card', $view->name());
    }
}
