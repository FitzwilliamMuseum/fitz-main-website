<?php

namespace Tests\Feature\Models;

use Tests\TestCase;

class ConservationBlogTest extends TestCase
{
    public function test_list_returns_conservation_blog_array()
    {
        $result = \App\Models\ConservationBlog::list();
        $this->assertIsArray($result);
    }

    public function test_get_data_returns_array()
    {
        $result = \App\Models\ConservationBlog::getData();
        $this->assertIsArray($result);
    }
}
