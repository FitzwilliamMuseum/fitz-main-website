<?php

namespace Tests\Feature\Models;

use Tests\TestCase;

class ShopifyTest extends TestCase
{
    public function test_list_returns_array()
    {
        $result = \App\Models\Shopify::list();
        $this->assertIsArray($result);
    }

    public function test_get_shopify_collection_returns_array()
    {
        // Test with a sample ids string
        $ids = '123,456,789';
        $result = \App\Models\Shopify::getShopifyCollection($ids);
        $this->assertIsArray($result);
    }
}
