<?php

namespace Tests\Feature\Controllers;

use App\Models\Directors;
use App\Models\Governance;
use App\Models\PressRoom;
use App\Models\PressTerms;
// use App\Models\SpoliationClaims;
use App\Models\StaffProfiles;
use App\Models\Vacancies;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\Request;
use PHPUnit\Framework\Attributes\CoversNothing;
use Tests\TestCase;
use Mockery;

class AboutusControllerFullTest extends TestCase
{
    use WithFaker;

    protected function setUp(): void
    {
        parent::setUp();
        if (Mockery::getContainer() != null) {
            Mockery::getContainer()->mockery_tearDown();
        }
    }

    protected function tearDown(): void
    {
        Mockery::close();
        parent::tearDown();
    }

    public function test_index_page_returns_200()
    {
        $response = $this->get(route('landing', 'about-us'));
        $response->assertStatus(200);
    }

    public function test_index_page_uses_landing_view()
    {
        $response = $this->get(route('landing', 'about-us'));
        $response->assertViewIs('pages.landing');
    }

    public function test_directors_page_returns_200()
    {
        $response = $this->get(route('directors'));
        $response->assertStatus(200);
    }

    public function test_directors_page_uses_directors_view()
    {
        $response = $this->get(route('directors'));
        $response->assertViewIs('aboutus.directors');
    }

    public function test_directors_page_has_directors_data()
    {
        $response = $this->get(route('directors'));
        $response->assertViewHas('directors');
    }

    public function test_director_profile_page_returns_200_if_exists()
    {
        $directors = Directors::getDirectors();
        $first = collect($directors['data'] ?? [])->first();
        $slug = $first['slug'] ?? null;
        if ($slug) {
            $response = $this->get(route('director', ['slug' => $slug]));
            $response->assertStatus(200);
        } else {
            $this->markTestSkipped('No director slug found in live data.');
        }
    }

    public function test_director_profile_page_uses_director_view_if_exists()
    {
        $directors = Directors::getDirectors();
        $first = collect($directors['data'] ?? [])->first();
        $slug = $first['slug'] ?? null;
        if ($slug) {
            $response = $this->get(route('director', ['slug' => $slug]));
            $response->assertViewIs('aboutus.director');
        } else {
            $this->markTestSkipped('No director slug found in live data.');
        }
    }

    public function test_director_profile_page_has_director_data_if_exists()
    {
        $directors = Directors::getDirectors();
        $first = collect($directors['data'] ?? [])->first();
        $slug = $first['slug'] ?? null;
        if ($slug) {
            $response = $this->get(route('director', ['slug' => $slug]));
            $response->assertViewHas('director');
        } else {
            $this->markTestSkipped('No director slug found in live data.');
        }
    }

    public function test_vacancies_page_returns_200()
    {
        $response = $this->get(route('vacancies'));
        $response->assertStatus(200);
    }

    public function test_vacancies_page_uses_vacancies_view()
    {
        $response = $this->get(route('vacancies'));
        $response->assertViewIs('aboutus.vacancies');
    }

    public function test_vacancies_page_has_vacancies_data()
    {
        $response = $this->get(route('vacancies'));
        $response->assertViewHas('vacancies');
    }

    public function test_archived_vacancies_page_returns_200()
    {
        $response = $this->get(route('vacancy.archive'));
        $response->assertStatus(200);
    }

    public function test_archived_vacancies_page_uses_archived_view()
    {
        $response = $this->get(route('vacancy.archive'));
        $response->assertViewIs('aboutus.archived');
    }

    public function test_archived_vacancies_page_has_vacancies_data()
    {
        $response = $this->get(route('vacancy.archive'));
        $response->assertViewHas('vacancies');
    }

    public function test_vacancy_page_returns_200_if_exists()
    {
        $vacancies = Vacancies::getVacancies();
        $first = collect($vacancies['data'] ?? [])->first();
        $slug = $first['slug'] ?? null;
        if ($slug) {
            $response = $this->get(route('vacancy', ['slug' => $slug]));
            $response->assertStatus(200);
        } else {
            $this->markTestSkipped('No vacancy slug found in live data.');
        }
    }

    public function test_vacancy_page_uses_vacancy_view_if_exists()
    {
        $vacancies = Vacancies::getVacancies();
        $first = collect($vacancies['data'] ?? [])->first();
        $slug = $first['slug'] ?? null;
        if ($slug) {
            $response = $this->get(route('vacancy', ['slug' => $slug]));
            $response->assertViewIs('aboutus.vacancy');
        } else {
            $this->markTestSkipped('No vacancy slug found in live data.');
        }
    }

    public function test_vacancy_page_has_vacancy_data_if_exists()
    {
        $vacancies = Vacancies::getVacancies();
        $first = collect($vacancies['data'] ?? [])->first();
        $slug = $first['slug'] ?? null;
        if ($slug) {
            $response = $this->get(route('vacancy', ['slug' => $slug]));
            $response->assertViewHas('vacancy');
        } else {
            $this->markTestSkipped('No vacancy slug found in live data.');
        }
    }

    public function test_governance_page_returns_200()
    {
        $response = $this->get(route('governance'));
        $response->assertStatus(200);
    }

    public function test_governance_page_uses_governance_view()
    {
        $response = $this->get(route('governance'));
        $response->assertViewIs('aboutus.governance');
    }

    public function test_governance_page_has_policy_data()
    {
        $response = $this->get(route('governance'));
        $response->assertViewHas('policy');
    }

    public function test_governance_page_has_strategy_data()
    {
        $response = $this->get(route('governance'));
        $response->assertViewHas('strategy');
    }

    public function test_governance_page_has_review_data()
    {
        $response = $this->get(route('governance'));
        $response->assertViewHas('review');
    }

    public function test_governance_page_has_report_data()
    {
        $response = $this->get(route('governance'));
        $response->assertViewHas('report');
    }

    public function test_governance_page_has_mission_data()
    {
        $response = $this->get(route('governance'));
        $response->assertViewHas('mission');
    }

    public function test_governance_page_has_education_data()
    {
        $response = $this->get(route('governance'));
        $response->assertViewHas('education');
    }

    public function test_governance_page_has_research_data()
    {
        $response = $this->get(route('governance'));
        $response->assertViewHas('research');
    }

    public function test_press_page_returns_200()
    {
        $response = $this->get(route('press-room'));
        $response->assertStatus(200);
    }

    public function test_press_page_uses_press_view()
    {
        $response = $this->get(route('press-room'));
        $response->assertViewIs('aboutus.press');
    }

    public function test_press_page_has_press_data()
    {
        $response = $this->get(route('press-room'));
        $response->assertViewHas('press');
    }

    public function test_staff_page_returns_200()
    {
        $response = $this->get(route('about.our.staff'));
        $response->assertStatus(200);
    }

    public function test_staff_page_uses_staff_view()
    {
        $response = $this->get(route('about.our.staff'));
        $response->assertViewIs('aboutus.staff');
    }

    public function test_staff_page_has_paginator_data()
    {
        $response = $this->get(route('about.our.staff'));
        $response->assertViewHas('paginator');
    }

    public function test_hockney_terms_page_returns_200()
    {
        $response = $this->get(route('press.hockney'));
        $response->assertStatus(200);
    }

    public function test_hockney_terms_page_uses_hockney_view()
    {
        $response = $this->get(route('press.hockney'));
        $response->assertViewIs('aboutus.hockney');
    }

    public function test_hockney_terms_page_has_terms_data()
    {
        $response = $this->get(route('press.hockney'));
        $response->assertViewHas('terms');
    }

    public function test_spoliation_claims_listing_page_skipped()
    {
        $this->markTestSkipped('Spoliation removed');
    }

    public function test_spoliation_claim_detail_page_skipped()
    {
        $this->markTestSkipped('Spoliation removed');
    }

    public function test_spoliation_claim_detail_page_returns_404_for_invalid_priref_skipped()
    {
        $this->markTestSkipped('Spoliation removed');
    }
}
