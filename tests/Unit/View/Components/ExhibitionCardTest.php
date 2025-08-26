<?php

namespace Tests\Unit\View\Components;

use App\View\Components\exhibitionCard;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use Tests\CreatesApplication;

class ExhibitionCardTest extends BaseTestCase
{
    use CreatesApplication;

    #[\PHPUnit\Framework\Attributes\Test]
    public function it_sets_properties_correctly()
    {
        $route = '/exhibition';
        $params = ['id' => 1];
        $title = 'Exhibition Title';
        $headingLevel = 'h2';
        $altTag = 'Alt Text';
        $image = ['src' => 'img.jpg'];
        $listingImage = ['src' => 'listing.jpg'];
        $listingImageAlt = 'Listing Alt';
        $startDate = '2025-01-01';
        $endDate = '2025-12-31';
        $ticketed = true;
        $status = 'open';
        $source = 'source';
        $tessitura = null;
        $copyright = '©';
    $component = new exhibitionCard($route, $params, $title, $altTag, $headingLevel, $image, $listingImage, $listingImageAlt, null, $startDate, $endDate, $ticketed, $status, $source, $tessitura, $copyright);
        $this->assertEquals($route, $component->route);
        $this->assertEquals($params, $component->params);
        $this->assertEquals($title, $component->title);
        $this->assertEquals($headingLevel, $component->headingLevel);
        $this->assertEquals($altTag, $component->altTag);
        $this->assertEquals($image, $component->image);
        $this->assertEquals($listingImage, $component->listingImage);
        $this->assertEquals($listingImageAlt, $component->listingImageAlt);
        $this->assertEquals($startDate, $component->startDate);
        $this->assertEquals($endDate, $component->endDate);
        $this->assertEquals($ticketed, $component->ticketed);
        $this->assertEquals($status, $component->status);
        $this->assertEquals($source, $component->source);
        $this->assertEquals($tessitura, $component->tessitura);
        $this->assertEquals($copyright, $component->copyright);
    }

    #[\PHPUnit\Framework\Attributes\Test]
    public function it_renders_the_correct_view()
    {
    $component = new exhibitionCard('/exhibition', ['id' => 1], 'Exhibition Title', 'Alt Text', 'h2', ['src' => 'img.jpg'], ['src' => 'listing.jpg'], 'Listing Alt', null, '2025-01-01', '2025-12-31', true, 'open', 'source', null, '©');
        $view = $component->render();
        $this->assertEquals('components.exhibition-card', $view->name());
    }
}
