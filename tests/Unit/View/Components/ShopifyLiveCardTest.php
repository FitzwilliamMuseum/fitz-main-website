<?php

namespace Tests\Unit\View\Components;

use App\View\Components\shopifyLiveCard;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use Tests\CreatesApplication;

class ShopifyLiveCardTest extends BaseTestCase
{
    use CreatesApplication;

    #[\PHPUnit\Framework\Attributes\Test]
    public function it_sets_result_property()
    {
        $result = ['id' => 2];
        $component = new shopifyLiveCard($result);
        $this->assertEquals($result, $component->result);
    }

    #[\PHPUnit\Framework\Attributes\Test]
    public function it_renders_the_correct_view()
    {
        $component = new shopifyLiveCard(['id' => 2]);
        $view = $component->render();
        $this->assertEquals('components.shopify-live-card', $view->name());
    }
}
