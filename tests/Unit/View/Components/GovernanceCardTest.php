<?php
namespace Tests\Unit\View\Components;
use App\View\Components\governanceCard;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use Tests\CreatesApplication;
class GovernanceCardTest extends BaseTestCase
{
    use CreatesApplication;
    #[\PHPUnit\Framework\Attributes\Test]
    public function it_sets_properties_correctly()
    {
        $title = 'Governance';
        $altTag = 'Alt';
        $image = ['src' => 'img.jpg'];
        $file = 'file.pdf';
        $type = 'type';
        $component = new governanceCard($title, $altTag, $image, $file, $type);
        $this->assertEquals($title, $component->title);
        $this->assertEquals($altTag, $component->altTag);
        $this->assertEquals($image, $component->image);
        $this->assertEquals($file, $component->file);
        $this->assertEquals($type, $component->type);
    }
    #[\PHPUnit\Framework\Attributes\Test]
    public function it_renders_the_correct_view()
    {
        $component = new governanceCard('Governance', 'Alt', ['src' => 'img.jpg'], 'file.pdf', 'type');
        $view = $component->render();
        $this->assertEquals('components.governance-card', $view->name());
    }
}
