<?php
namespace Tests\Unit\View\Components;
use App\View\Components\searchContentType;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use Tests\CreatesApplication;
class SearchContentTypeTest extends BaseTestCase
{
    use CreatesApplication;
    #[\PHPUnit\Framework\Attributes\Test]
    public function it_sets_type_property()
    {
        $type = 'type';
        $component = $this->getMockBuilder(searchContentType::class)
            ->disableOriginalConstructor()
            ->onlyMethods(['getDisplayName'])
            ->getMock();
        $component->expects($this->once())->method('getDisplayName')->with($type)->willReturn('Type Name');
        $component->__construct($type);
        $this->assertEquals('Type Name', $component->type);
    }
    #[\PHPUnit\Framework\Attributes\Test]
    public function it_renders_the_correct_view()
    {
        $component = $this->getMockBuilder(searchContentType::class)
            ->disableOriginalConstructor()
            ->onlyMethods(['getDisplayName'])
            ->getMock();
        $component->method('getDisplayName')->willReturn('Type Name');
        $component->__construct('type');
        $view = $component->render();
        $this->assertEquals('components.search-content-type', $view->name());
    }
}
