<?php
namespace Tests\Unit\View\Components;
use App\View\Components\twitterCard;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use Tests\CreatesApplication;
class TwitterCardTest extends BaseTestCase
{
    use CreatesApplication;
    #[\PHPUnit\Framework\Attributes\Test]
    public function it_sets_tweet_property()
    {
        $tweet = ['id' => 1];
        $component = new twitterCard($tweet);
        $this->assertEquals($tweet, $component->tweet);
    }
    #[\PHPUnit\Framework\Attributes\Test]
    public function it_renders_the_correct_view()
    {
        $component = new twitterCard(['id' => 1]);
        $view = $component->render();
        $this->assertEquals('components.twitter-card', $view->name());
    }
}
