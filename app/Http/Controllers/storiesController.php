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
        // Questions:
        // How is the order dictated?
        // How is the banner entry selected?
        // Do authors need to link?
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

        // Sections and components are M2M, so unwrap the junction rows. Sections are
        // ordered by their sort field; components have none, so keep junction order.
        $story['sections'] = collect($story['sections'] ?? [])
            ->pluck('story_sections_id')
            ->filter()
            ->sortBy('sort')
            ->map(function ($section) {
                $section['components'] = collect($section['components'] ?? [])
                    ->pluck('story_components_id')
                    ->filter()
                    ->map(function ($component) {
                        $component['gallery_images'] = collect($component['gallery_images'] ?? [])
                            ->pluck('files_id')
                            ->filter()
                            ->values()
                            ->all();
                        return $component;
                    })
                    ->values()
                    ->all();
                return $section;
            })
            ->values()
            ->all();

        return view('stories.story', ['story' => $story]);
    }
}