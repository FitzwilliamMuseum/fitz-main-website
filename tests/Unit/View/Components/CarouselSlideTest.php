<?php

namespace Tests\Unit\View\Components;

use App\View\Components\carouselSlide;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use Tests\CreatesApplication;

class CarouselSlideTest extends BaseTestCase
{
    use CreatesApplication;

    #[\PHPUnit\Framework\Attributes\Test]
    public function it_sets_properties_correctly()
    {
        $slides = [['img' => 'a.jpg']];
        $class = 'slide-class';
        $imageObject = 'imgObj';
        $title = 'Slide Title';
        $route = '/slide';
        $param = 'id';
        $slugify = true;
        $component = new carouselSlide($slides, $class, $imageObject, $title, $route, $param, $slugify);
        $this->assertEquals($slides, $component->slides);
        $this->assertEquals($class, $component->class);
        $this->assertEquals($imageObject, $component->imageObject);
        $this->assertEquals($title, $component->title);
        $this->assertEquals($route, $component->route);
        $this->assertEquals($param, $component->param);
        $this->assertEquals($slugify, $component->slugify);
    }

    #[\PHPUnit\Framework\Attributes\Test]
    public function it_renders_the_correct_view()
    {
        $component = new carouselSlide([['img' => 'a.jpg']], 'slide-class', 'imgObj', 'Slide Title', '/slide', 'id', true);
        $view = $component->render();
        $this->assertEquals('components.carousel-slide', $view->name());
    }
}
