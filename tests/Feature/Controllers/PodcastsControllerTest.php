<?php

namespace Tests\Feature\Controllers;
use Mockery;

use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;
use App\Models\PodcastSeries;
use App\Models\PodcastArchive;
use App\Models\MindsEye;
use App\Models\AssociatedPeople;
use App\Http\Controllers\searchController;

class PodcastsControllerTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();
    }

    protected function tearDown(): void
    {
        \Mockery::close();
        parent::tearDown();
    }

    // INDEX PAGE
    #[Test]
    public function index_page_returns_status_200()
    {
        $response = $this->get(route('podcasts'));
        $response->assertStatus(200);
    }

    #[Test]
    public function index_page_uses_correct_view()
    {
        $response = $this->get(route('podcasts'));
        $response->assertViewIs('podcasts.index');
    }

    #[Test]
    public function index_page_has_podcasts_variable()
    {
        $response = $this->get(route('podcasts'));
        $response->assertViewHas('podcasts');
    }

    // SERIES PAGE
    #[Test]
    public function series_page_returns_status_200_if_series_exists()
    {
        $seriesList = PodcastSeries::list();
        $series = $seriesList['data'][0] ?? null;
        if ($series && !empty($series['slug'])) {
            $response = $this->get(route('podcasts.series', ['slug' => $series['slug']]));
            $response->assertStatus(200);
        } else {
            Mockery::mock('alias:' . searchController::class)
                ->shouldReceive('injectResults')
                ->andReturn([]);
            $response = $this->get(route('podcasts.series', ['slug' => 'nonsense']));
            $response->assertStatus(404);
        }
    }

    #[Test]
    public function series_page_uses_correct_view_if_series_exists()
    {
        $seriesList = PodcastSeries::list();
        $series = $seriesList['data'][0] ?? null;
        if ($series && !empty($series['slug'])) {
            $response = $this->get(route('podcasts.series', ['slug' => $series['slug']]));
            $response->assertViewIs('podcasts.series');
        } else {
            Mockery::mock('alias:' . searchController::class)
                ->shouldReceive('injectResults')
                ->andReturn([]);
            $response = $this->get(route('podcasts.series', ['slug' => 'nonsense']));
            $response->assertViewIs('errors.404');
        }
    }

    #[Test]
    public function series_page_has_podcasts_variable_if_series_exists()
    {
        $seriesList = PodcastSeries::list();
        $series = $seriesList['data'][0] ?? null;
        if ($series && !empty($series['slug'])) {
            $response = $this->get(route('podcasts.series', ['slug' => $series['slug']]));
            $response->assertViewHas('podcasts');
        }
    }

    // EPISODE PAGE
    #[Test]
    public function episode_page_returns_status_200_if_episode_exists()
    {
        $seriesList = PodcastSeries::list();
        $series = $seriesList['data'][0] ?? null;
        $episode = null;
        if ($series && !empty($series['id'])) {
            $episodes = PodcastArchive::find($series['id']);
            $episode = $episodes['data'][0] ?? null;
        }
        if ($episode && !empty($episode['slug'])) {
            $response = $this->get(route('podcasts.episode', ['slug' => $episode['slug']]));
            $response->assertStatus(200);
        } else {
            Mockery::mock('alias:' . searchController::class)
                ->shouldReceive('injectResults')
                ->andReturnNull();
            $response = $this->get(route('podcasts.episode', ['slug' => 'nonsense']));
            $response->assertStatus(404);
        }
    }

    #[Test]
    public function episode_page_has_podcasts_variable_if_episode_exists()
    {
        $seriesList = PodcastSeries::list();
        $series = $seriesList['data'][0] ?? null;
        $episode = null;
        if ($series && !empty($series['id'])) {
            $episodes = PodcastArchive::find($series['id']);
            $episode = $episodes['data'][0] ?? null;
        }
        if ($episode && !empty($episode['slug'])) {
            $response = $this->get(route('podcasts.episode', ['slug' => $episode['slug']]));
            $response->assertViewHas('podcasts');
        }
    }

    // MINDSEYES PAGE
    #[Test]
    public function mindseyes_page_returns_status_200()
    {
        $response = $this->get(route('mindeyes'));
        $response->assertStatus(200);
    }

    #[Test]
    public function mindseyes_page_has_mindseyes_variable()
    {
        $response = $this->get(route('mindeyes'));
        $response->assertViewHas('mindseyes');
    }

    // MINDSEYE PAGE
    #[Test]
    public function mindseye_page_returns_status_200_if_exists()
    {
        $request = request();
        $mindseyes = MindsEye::list($request);
        $mindseye = $mindseyes['data'][0] ?? null;
        if ($mindseye && !empty($mindseye['slug'])) {
            $response = $this->get(route('mindeyes.story', ['slug' => $mindseye['slug']]));
            $response->assertStatus(200);
        } else {
            Mockery::mock('alias:' . searchController::class)
                ->shouldReceive('injectResults')
                ->andReturn([]);
            $response = $this->get(route('mindeyes.story', ['slug' => 'nonexistent-slug']));
            $response->assertStatus(404);
        }
    }

    #[Test]
    public function mindseye_page_has_mindseye_variable_if_exists()
    {
        $request = request();
        $mindseyes = MindsEye::list($request);
        $mindseye = $mindseyes['data'][0] ?? null;
        if ($mindseye && !empty($mindseye['slug'])) {
            $response = $this->get(route('mindeyes.story', ['slug' => $mindseye['slug']]));
            $response->assertViewHas('mindseye');
        }
    }

    // PRESENTER PAGE
    #[Test]
    public function presenter_page_returns_status_200_if_exists()
    {
        $presenters = AssociatedPeople::list();
        $presenter = $presenters['data'][0] ?? null;
        if ($presenter && !empty($presenter['slug'])) {
            $response = $this->get(route('podcast.presenter', ['slug' => $presenter['slug']]));
            $response->assertStatus(200);
        } else {
            Mockery::mock('alias:' . searchController::class)
                ->shouldReceive('injectResults')
                ->andReturn([]);
            $response = $this->get(route('podcast.presenter', ['slug' => 'nonexistent-slug']));
            $response->assertStatus(404);
        }
    }

    #[Test]
    public function presenter_page_has_profile_variable_if_exists()
    {
        $presenters = AssociatedPeople::list();
        $presenter = $presenters['data'][0] ?? null;
        if ($presenter && !empty($presenter['slug'])) {
            $response = $this->get(route('podcast.presenter', ['slug' => $presenter['slug']]));
            $response->assertViewHas('profile');
        }
    }

    // PRESENTERS PAGE
    #[Test]
    public function presenters_page_returns_status_200_if_profiles_exist()
    {
        $response = $this->get(route('podcast.presenters'));
        if ($response->viewData('profiles') ?? false) {
            $response->assertStatus(200);
        } else {
            Mockery::mock('alias:' . searchController::class)
                ->shouldReceive('injectResults')
                ->andReturn([]);
            $response->assertStatus(404);
        }
    }

    #[Test]
    public function presenters_page_has_profiles_variable_if_exists()
    {
        $response = $this->get(route('podcast.presenters'));
        if ($response->viewData('profiles') ?? false) {
            $response->assertViewHas('profiles');
        }
    }
}
