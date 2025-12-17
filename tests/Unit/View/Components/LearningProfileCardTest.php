<?php
namespace Tests\Unit\View\Components;
use App\View\Components\learningProfileCard;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use Tests\CreatesApplication;
class LearningProfileCardTest extends BaseTestCase
{
    use CreatesApplication;
    #[\PHPUnit\Framework\Attributes\Test]
    public function it_sets_profile_property()
    {
        $profile = ['name' => 'Profile'];
        $component = new learningProfileCard($profile);
        $this->assertEquals($profile, $component->profile);
    }
    #[\PHPUnit\Framework\Attributes\Test]
    public function it_renders_the_correct_view()
    {
        $component = new learningProfileCard(['name' => 'Profile']);
        $view = $component->render();
        $this->assertEquals('components.learning-profile-card', $view->name());
    }
}
