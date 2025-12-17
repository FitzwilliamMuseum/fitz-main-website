<?php

namespace Tests\Unit\View\Components;

use App\View\Components\ciimCard;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use Tests\CreatesApplication;

class CiimCardTest extends BaseTestCase
{
    use CreatesApplication;

    #[\PHPUnit\Framework\Attributes\Test]
    public function it_sets_record_property()
    {
        $record = ['id' => 1];
        $component = new ciimCard($record);
        $this->assertEquals($record, $component->record);
    }

    #[\PHPUnit\Framework\Attributes\Test]
    public function it_renders_the_correct_view()
    {
        $component = new ciimCard(['id' => 1]);
        $view = $component->render();
        $this->assertEquals('components.ciim-card', $view->name());
    }
}
