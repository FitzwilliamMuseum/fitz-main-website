<?php
namespace Tests\Unit\View\Components;
use App\View\Components\vacancy;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use Tests\CreatesApplication;
class VacancyTest extends BaseTestCase
{
    use CreatesApplication;
    #[\PHPUnit\Framework\Attributes\Test]
    public function it_sets_vacancy_property()
    {
        $vacancy = ['id' => 1];
        $component = new vacancy($vacancy);
        $this->assertEquals($vacancy, $component->vacancy);
    }
    #[\PHPUnit\Framework\Attributes\Test]
    public function it_renders_the_correct_view()
    {
        $component = new vacancy(['id' => 1]);
        $view = $component->render();
        $this->assertEquals('components.vacancy', $view->name());
    }
}
