<?php

namespace Tests\Unit\View\Components;

use App\View\Components\FriendlySearch;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use Tests\CreatesApplication;

class FriendlySearchTest extends BaseTestCase
{
    use CreatesApplication;

    #[\PHPUnit\Framework\Attributes\Test]
    public function it_sets_name_property()
    {
        $name = 'search';
        $component = new FriendlySearch($name);
        $this->assertEquals($name, $component->name);
    }

    #[\PHPUnit\Framework\Attributes\Test]
    public function it_renders_the_correct_view()
    {
        $component = new FriendlySearch('search');
        $view = $component->render();
        $this->assertEquals('components.friendly-search', $view->name());
    }
}
