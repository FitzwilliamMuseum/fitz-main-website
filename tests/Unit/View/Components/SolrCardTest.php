<?php
namespace Tests\Unit\View\Components;
use App\View\Components\solrCard;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use Tests\CreatesApplication;
class SolrCardTest extends BaseTestCase
{
    use CreatesApplication;
    #[\PHPUnit\Framework\Attributes\Test]
    public function it_sets_result_property()
    {
        $result = ['id' => 1];
        $component = new solrCard($result);
        $this->assertEquals($result, $component->result);
    }
    #[\PHPUnit\Framework\Attributes\Test]
    public function it_renders_the_correct_view()
    {
        $component = new solrCard(['id' => 1]);
        $view = $component->render();
        $this->assertEquals('components.solr-card', $view->name());
    }
}
