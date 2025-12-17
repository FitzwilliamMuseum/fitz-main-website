<?php

namespace Tests\Unit\View\Components;

use App\View\Components\ttnArtist;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use Tests\CreatesApplication;

class TtnArtistTest extends BaseTestCase
{
    use CreatesApplication;

    #[\PHPUnit\Framework\Attributes\Test]
    public function it_sets_artists_property()
    {
        $artists = [['name' => 'Artist']];
        $component = new ttnArtist($artists);
        $this->assertEquals($artists, $component->artists);
    }

    #[\PHPUnit\Framework\Attributes\Test]
    public function it_renders_the_correct_view()
    {
        $component = new ttnArtist([['name' => 'Artist']]);
        $view = $component->render();
        $this->assertEquals('components.ttn-artist', $view->name());
    }
}
