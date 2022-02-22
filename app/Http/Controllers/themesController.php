<?php

namespace App\Http\Controllers;

use App\Models\Stubs;
use App\Models\Themes;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Response;

class themesController extends Controller
{

    /**
     * @return View
     */
    public function index(): View
    {
        $pages = Stubs::getLanding('themes');
        $themes = Themes::list();
        return view('themes.index', compact('themes', 'pages'));
    }

    /**
     * @param string $slug
     * @return View|Response
     */
    public function theme(string $slug): View|Response
    {
        $themes = Themes::details($slug);
        if (empty($themes['data'])) {
            return response()->view('errors.404', [], 404);
        }
        return view('themes.theme', compact('themes'));
    }
}
