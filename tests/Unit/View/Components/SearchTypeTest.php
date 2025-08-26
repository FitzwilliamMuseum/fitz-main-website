<?php
namespace Tests\Unit\View\Components;
use App\View\Components\searchType;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use Tests\CreatesApplication;
class SearchTypeTest extends BaseTestCase
{
    use CreatesApplication;
    #[\PHPUnit\Framework\Attributes\Test]
    public function it_sets_properties_correctly()
    {
        $name = 'search';
        $title = 'Search Title';
        $component = $this->getMockBuilder(searchType::class)
            ->disableOriginalConstructor()
            ->onlyMethods(['titleString'])
            ->getMock();
        $component->expects($this->once())->method('titleString')->with($title)->willReturn($title);
        $component->__construct($name, $title);
        $this->assertEquals($name, $component->name);
        $this->assertEquals($title, $component->title);
    }
    #[\PHPUnit\Framework\Attributes\Test]
    public function it_renders_the_correct_view()
    {
        $component = $this->getMockBuilder(searchType::class)
            ->disableOriginalConstructor()
            ->onlyMethods(['titleString'])
            ->getMock();
        $component->method('titleString')->willReturn('Search Title');
        $component->__construct('search', 'Search Title');
        $view = $component->render();
        $this->assertEquals('components.search-type', $view->name());
    }
}
