<?php

namespace Tests\Unit\View\Components;

use App\View\Components\wordpressCard;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use Tests\CreatesApplication;

class WordpressCardTest extends BaseTestCase
{
    use CreatesApplication;

    #[\PHPUnit\Framework\Attributes\Test]
    public function it_sets_properties_correctly()
    {
        $title = 'Wordpress Title';
        $image = 'img.jpg';
        $url = 'https://example.com';
        $component = new wordpressCard($title, $image, $url);
        $this->assertEquals($title, $component->title);
        $this->assertEquals($image, $component->image);
        $this->assertEquals($url, $component->url);
    }

    #[\PHPUnit\Framework\Attributes\Test]
    public function it_renders_the_correct_view()
    {
        $component = new wordpressCard('Wordpress Title', 'img.jpg', 'https://example.com');
        $view = $component->render();
        $this->assertEquals('components.wordpress-card', $view->name());
    }
}
