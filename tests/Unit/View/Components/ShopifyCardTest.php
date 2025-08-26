<?php

namespace Tests\Unit\View\Components;

use App\View\Components\shopifyCard;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use Tests\CreatesApplication;

class ShopifyCardTest extends BaseTestCase
{
    use CreatesApplication;

    #[\PHPUnit\Framework\Attributes\Test]
    public function it_sets_result_property()
    {
        $result = ['id' => 1];
        $component = new shopifyCard($result);
        $this->assertEquals($result, $component->result);
    }

    #[\PHPUnit\Framework\Attributes\Test]
    public function it_renders_the_correct_view()
    {
        $component = new shopifyCard(['id' => 1]);
        $view = $component->render();
        $this->assertEquals('components.shopify-card', $view->name());
    }
}
