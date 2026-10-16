<?php

namespace App\Http\Controllers;

use App\Models\Stories;
use Illuminate\Contracts\View\View;

class storiesController extends Controller
{
    /**
     * @return View
     */
    public function index(): View
    {
        return view('stories.index', [
            'stories' => Stories::list()['data'] ?? []
        ]);
    }

    /**
     * @param string $slug
     */
    public function story(string $slug)
    {
        $data = Stories::find($slug);
        if (empty($data['data'])) {
            return response()->view('errors.404', [], 404);
        }

        $story = collect($data['data'])->first();

        // Make sure sections and components are in editor-defined order
        $story['sections'] = collect($story['sections'] ?? [])->sortBy('sort')->map(function ($section) {
            $section['components'] = collect($section['components'] ?? [])->sortBy('sort')->values()->all();
            return $section;
        })->values()->all();

        return view('stories.story', ['story' => $story]);
    }
}