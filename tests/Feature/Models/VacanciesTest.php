<?php

namespace Tests\Feature\Models;

use Illuminate\Http\Request;
use Tests\TestCase;

class VacanciesTest extends TestCase
{
    public function test_get_vacancies_returns_collection()
    {
        $result = \App\Models\Vacancies::getVacancies();
        $this->assertInstanceOf(\Illuminate\Support\Collection::class, $result);
    }

    public function test_get_archived_returns_paginator()
    {
        $request = new Request(['page' => 1]);
        $result = \App\Models\Vacancies::getArchived(12, $request);
        $this->assertInstanceOf(\Illuminate\Pagination\LengthAwarePaginator::class, $result);
    }

    public function test_get_vacancy_returns_array()
    {
        $slug = 'test-slug';
        $result = \App\Models\Vacancies::getVacancy($slug);
        $this->assertIsArray($result);
    }
}
