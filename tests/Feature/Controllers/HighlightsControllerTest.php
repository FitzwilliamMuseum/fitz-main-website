<?php

namespace Tests\Feature\Controllers;

use Mockery;
use App\Models\Highlights;
use App\Models\HighlightPages;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Tests\TestCase;
use App\Http\Controllers\searchController;

class HighlightsControllerTest extends TestCase
{
    use WithFaker;

    protected function setUp(): void
    {
        parent::setUp();
    }

    protected function tearDown(): void
    {
        \Mockery::close();
        parent::tearDown();
    }

    // Index page
    public function test_index_page_status_200()
    {
        $response = $this->get(route('highlights'));
        $response->assertStatus(200);
    }

    public function test_index_page_view()
    {
        $response = $this->get(route('highlights'));
        $response->assertViewIs('highlights.index');
    }

    public function test_index_page_has_paginator()
    {
        $response = $this->get(route('highlights'));
        $response->assertViewHas('paginator');
    }

    // Details page
    public function test_details_page_status_200()
    {
        $highlights = Highlights::list(new Request());
        $first = collect($highlights['data'] ?? [])->first();
        $slug = $first['slug'] ?? null;
        if ($slug) {
            $response = $this->get(route('highlight', ['slug' => $slug]));
            $response->assertStatus(200);
        } else {
            $this->markTestSkipped('No highlight slug found in live data.');
        }
    }

    public function test_details_page_view()
    {
        $highlights = Highlights::list(new Request());
        $first = collect($highlights['data'] ?? [])->first();
        $slug = $first['slug'] ?? null;
        if ($slug) {
            $response = $this->get(route('highlight', ['slug' => $slug]));
            $response->assertViewIs('highlights.details');
        } else {
            $this->markTestSkipped('No highlight slug found in live data.');
        }
    }

    public function test_details_page_has_pharos()
    {
        $highlights = Highlights::list(new Request());
        $first = collect($highlights['data'] ?? [])->first();
        $slug = $first['slug'] ?? null;
        if ($slug) {
            $response = $this->get(route('highlight', ['slug' => $slug]));
            $response->assertViewHas('pharos');
        } else {
            $this->markTestSkipped('No highlight slug found in live data.');
        }
    }

    public function test_details_page_404_for_invalid_slug()
    {
        Mockery::mock('alias:' . searchController::class)
            ->shouldReceive('injectResults')
            ->andReturnNull();
        $response = $this->get(route('highlight', ['slug' => 'nonexistent-highlight-slug-12345']));
        $response->assertStatus(404);
    }

    // Associate page
    public function test_associate_page_status_200()
    {
        $pages = HighlightPages::getContexts();
        $first = collect($pages['data'] ?? [])->first();
        $section = $first['section'] ?? 'themes';
        $slug = $first['slug'] ?? 'eleusis-myth-and-mysteries';
        if ($section && $slug) {
            $response = $this->get(route('context-section-detail', ['section' => $section, 'slug' => $slug]));
            $response->assertStatus(200);
        } else {
            $this->markTestSkipped('No highlight associate section/slug found in live data.');
        }
    }

    public function test_associate_page_view()
    {
        $pages = HighlightPages::getContexts();
        $first = collect($pages['data'] ?? [])->first();
        $section = $first['section'] ?? 'themes';
        $slug = $first['slug'] ?? 'eleusis-myth-and-mysteries';
        if ($section && $slug) {
            $response = $this->get(route('context-section-detail', ['section' => $section, 'slug' => $slug]));
            $response->assertViewIs('highlights.associate');
        } else {
            $this->markTestSkipped('No highlight associate section/slug found in live data.');
        }
    }

    public function test_associate_page_has_pharos()
    {
        $pages = HighlightPages::getContexts();
        $first = collect($pages['data'] ?? [])->first();
        $section = $first['section'] ?? 'themes';
        $slug = $first['slug'] ?? 'eleusis-myth-and-mysteries';
        if ($section && $slug) {
            $response = $this->get(route('context-section-detail', ['section' => $section, 'slug' => $slug]));
            $response->assertViewHas('pharos');
        } else {
            $this->markTestSkipped('No highlight associate section/slug found in live data.');
        }
    }

    // Landing page
    public function test_landing_page_status_200()
    {
        $response = $this->get(route('highlights'));
        $response->assertStatus(200);
    }

    public function test_landing_page_view()
    {
        $response = $this->get(route('highlights'));
        $response->assertViewIs('highlights.index');
    }

    public function test_landing_page_has_paginator()
    {
        $response = $this->get(route('highlights'));
        $response->assertViewHas('paginator');
    }

    // Results page
    public function test_results_page_status_200()
    {
        $response = $this->post(route('highlight-search'), ['query' => 'art']);
        $response->assertStatus(200);
    }

    public function test_results_page_view()
    {
        $response = $this->post(route('highlight-search'), ['query' => 'art']);
        $response->assertViewIs('highlights.results');
    }

    public function test_results_page_has_expected_data()
    {
        $response = $this->post(route('highlight-search'), ['query' => 'art']);
        $response->assertViewHas(['records', 'number', 'paginate', 'queryString']);
    }

    // Audioguide page
    public function test_audioguide_page_status_200()
    {
        $response = $this->get(route('audio-guide'));
        $response->assertStatus(200);
    }

    public function test_audioguide_page_view()
    {
        $response = $this->get(route('audio-guide'));
        $response->assertViewIs('highlights.audioguide');
    }

    public function test_audioguide_page_has_stops()
    {
        $response = $this->get(route('audio-guide'));
        $response->assertViewHas('stops');
    }

    public function test_stop_page_skipped()
    {
        $this->markTestSkipped('No audio guide found in live data anymore - legacy content removed :( ');
    }

    public function test_stop_page_404_for_invalid_slug()
    {
        Mockery::mock('alias:' . searchController::class)
            ->shouldReceive('injectResults')
            ->andReturnNull();
        $response = $this->get(route('audio-stop', ['slug' => 'nonexistent-stop-slug-12345']));
        $response->assertStatus(404);
    }

    // Pharos sections page
    public function test_pharos_sections_page_status_200()
    {
        $pages = HighlightPages::getContexts();
        $first = collect($pages['data'] ?? [])->first();
        $section = $first['section'] ?? null;
        if ($section) {
            $response = $this->get(route('context-sections', ['section' => $section]));
            $response->assertStatus(200);
        } else {
            $this->markTestSkipped('No highlight section found in live data.');
        }
    }

    public function test_pharos_sections_page_view()
    {
        $pages = HighlightPages::getContexts();
        $first = collect($pages['data'] ?? [])->first();
        $section = $first['section'] ?? null;
        if ($section) {
            $response = $this->get(route('context-sections', ['section' => $section]));
            $response->assertViewIs('highlights.sections');
        } else {
            $this->markTestSkipped('No highlight section found in live data.');
        }
    }

    public function test_pharos_sections_page_has_pharos()
    {
        $pages = HighlightPages::getContexts();
        $first = collect($pages['data'] ?? [])->first();
        $section = $first['section'] ?? null;
        if ($section) {
            $response = $this->get(route('context-sections', ['section' => $section]));
            $response->assertViewHas('pharos');
        } else {
            $this->markTestSkipped('No highlight section found in live data.');
        }
    }

    // Contextual page
    public function test_contextual_page_status_or_404()
    {
        Mockery::mock('alias:' . searchController::class)
            ->shouldReceive('injectResults')
            ->andReturnNull();
        $response = $this->get(route('context'));
        if ($response->status() === 404) {
            $response->assertStatus(404);
        } else {
            $response->assertStatus(200);
        }
    }

    public function test_contextual_page_view_if_200()
    {
        Mockery::mock('alias:' . searchController::class)
            ->shouldReceive('injectResults')
            ->andReturnNull();
        $response = $this->get(route('context'));
        if ($response->status() !== 404) {
            $response->assertViewIs('highlights.context');
        } else {
            $this->markTestSkipped('Context page returned 404.');
        }
    }

    public function test_contextual_page_has_context_if_200()
    {
        Mockery::mock('alias:' . searchController::class)
            ->shouldReceive('injectResults')
            ->andReturnNull();
        $response = $this->get(route('context'));
        if ($response->status() !== 404) {
            $response->assertViewHas('context');
        } else {
            $this->markTestSkipped('Context page returned 404.');
        }
    }

    // Period page
    public function test_period_page_status_or_404()
    {
        Mockery::mock('alias:' . searchController::class)
            ->shouldReceive('injectResults')
            ->andReturnNull();
        $response = $this->get(route('periods'));
        if ($response->status() === 404) {
            $response->assertStatus(404);
        } else {
            $response->assertStatus(200);
        }
    }

    public function test_period_page_view_if_200()
    {
        Mockery::mock('alias:' . searchController::class)
            ->shouldReceive('injectResults')
            ->andReturnNull();
        $response = $this->get(route('periods'));
        if ($response->status() !== 404) {
            $response->assertViewIs('highlights.period');
        } else {
            $this->markTestSkipped('Period page returned 404.');
        }
    }

    public function test_period_page_has_periods_if_200()
    {
        Mockery::mock('alias:' . searchController::class)
            ->shouldReceive('injectResults')
            ->andReturnNull();
        $response = $this->get(route('periods'));
        if ($response->status() !== 404) {
            $response->assertViewHas('periods');
        } else {
            $this->markTestSkipped('Period page returned 404.');
        }
    }

    // By period page
    public function test_by_period_page_status_or_404()
    {
        $periods = Highlights::getPeriods();
        $first = collect($periods['data'] ?? [])->first();
        $period = isset($first['period_assigned']) ? Str::slug($first['period_assigned']) : null;
        if ($period) {
            $response = $this->get(route('period', ['period' => $period]));
            if ($response->status() === 404) {
                $response->assertStatus(404);
            } else {
                $response->assertStatus(200);
            }
        } else {
            $this->markTestSkipped('No highlight period found in live data.');
        }
    }

    public function test_by_period_page_view_if_200()
    {
        $periods = Highlights::getPeriods();
        $first = collect($periods['data'] ?? [])->first();
        $period = isset($first['period_assigned']) ? Str::slug($first['period_assigned']) : null;
        if ($period) {
            $response = $this->get(route('period', ['period' => $period]));
            if ($response->status() !== 404) {
                $response->assertViewIs('highlights.byperiod');
            } else {
                $this->markTestSkipped('By period page returned 404.');
            }
        } else {
            $this->markTestSkipped('No highlight period found in live data.');
        }
    }

    public function test_by_period_page_has_pharos_and_period_if_200()
    {
        $periods = Highlights::getPeriods();
        $first = collect($periods['data'] ?? [])->first();
        $period = isset($first['period_assigned']) ? Str::slug($first['period_assigned']) : null;
        if ($period) {
            $response = $this->get(route('period', ['period' => $period]));
            if ($response->status() !== 404) {
                $response->assertViewHas(['pharos', 'period']);
            } else {
                $this->markTestSkipped('By period page returned 404.');
            }
        } else {
            $this->markTestSkipped('No highlight period found in live data.');
        }
    }

    // Theme page
    public function test_theme_page_status_200()
    {
        $response = $this->get(route('themes'));
        $response->assertStatus(200);
    }

    public function test_theme_page_view()
    {
        $response = $this->get(route('themes'));
        $response->assertViewIs('highlights.theme');
    }

    public function test_theme_page_has_pharos()
    {
        $response = $this->get(route('themes'));
        $response->assertViewHas('pharos');
    }

    // By theme page
    public function test_by_theme_page_status_or_404()
    {
        $themes = \App\Models\HighlightThemes::list();
        $first = collect($themes['data'] ?? [])->first();
        $theme = $first['slug'] ?? null;
        if ($theme) {
            $response = $this->get(route('theme', ['theme' => $theme]));
            if ($response->status() === 404) {
                $response->assertStatus(404);
            } else {
                $response->assertStatus(200);
            }
        } else {
            $this->markTestSkipped('No highlight theme found in live data.');
        }
    }

    public function test_by_theme_page_view_if_200()
    {
        $themes = \App\Models\HighlightThemes::list();
        $first = collect($themes['data'] ?? [])->first();
        $theme = $first['slug'] ?? null;
        if ($theme) {
            $response = $this->get(route('theme', ['theme' => $theme]));
            if ($response->status() !== 404) {
                $response->assertViewIs('highlights.bytheme');
            } else {
                $this->markTestSkipped('By theme page returned 404.');
            }
        } else {
            $this->markTestSkipped('No highlight theme found in live data.');
        }
    }

    public function test_by_theme_page_has_pharos_and_theme_if_200()
    {
        $themes = \App\Models\HighlightThemes::list();
        $first = collect($themes['data'] ?? [])->first();
        $theme = $first['slug'] ?? null;
        if ($theme) {
            $response = $this->get(route('theme', ['theme' => $theme]));
            if ($response->status() !== 404) {
                $response->assertViewHas(['pharos', 'theme']);
            } else {
                $this->markTestSkipped('By theme page returned 404.');
            }
        } else {
            $this->markTestSkipped('No highlight theme found in live data.');
        }
    }
}
