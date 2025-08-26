<?php
namespace Tests\Unit\View\Components;
use App\View\Components\ttnArtistDetail;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use Tests\CreatesApplication;
class TtnArtistDetailTest extends BaseTestCase
{
    use CreatesApplication;
    #[\PHPUnit\Framework\Attributes\Test]
    public function it_sets_artist_property()
    {
        $artist = ['name' => 'Artist'];
        $component = new ttnArtistDetail($artist);
        $this->assertEquals($artist, $component->artist);
    }
    #[\PHPUnit\Framework\Attributes\Test]
    public function it_renders_the_correct_view()
    {
        $component = new ttnArtistDetail(['name' => 'Artist']);
        $view = $component->render();
        $this->assertEquals('components.ttn-artist-detail', $view->name());
    }
}
