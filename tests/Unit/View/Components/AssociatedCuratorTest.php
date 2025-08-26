<?php

namespace Tests\Unit\View\Components;

use App\View\Components\associatedCurator;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use Illuminate\Support\Facades\View;
use Tests\CreatesApplication;

class AssociatedCuratorTest extends BaseTestCase
{
    use CreatesApplication;

    #[\PHPUnit\Framework\Attributes\Test]
    public function it_sets_curator_property()
    {
        $curator = ['name' => 'John Doe', 'role' => 'Curator'];
        $component = new associatedCurator($curator);
        $this->assertEquals($curator, $component->curator);
    }

    #[\PHPUnit\Framework\Attributes\Test]
    public function it_renders_the_correct_view()
    {
        $curator = ['name' => 'Jane Smith', 'role' => 'Curator'];
        $component = new associatedCurator($curator);
        $view = $component->render();
        $this->assertEquals('components.associated-curator', $view->name());
    }
}
