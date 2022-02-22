<?php

namespace App\Http\Controllers;

use App\Models\CIIM;
use App\Models\Galleries;
use App\Models\Stubs;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Response;

class galleriesController extends Controller
{
    /**
     * @return View
     */
    public function index(): View
    {
        $pages = Stubs::getLanding('galleries');
        $galleries = Galleries::list();
        return view('galleries.index', compact('galleries', 'pages'));
    }

    /**
     * @param string $slug
     * @return View|Response
     */
    public function gallery(string $slug): View|Response
    {
        $galleries = Galleries::find($slug);
        if (empty($galleries['data'])) {
            return response()->view('errors.404', [], 404);
        }
        return view('galleries.gallery', compact('galleries'));
    }

    /**
     * @param string $prirefs
     * @return array
     */
    public static function getObjects(string $prirefs): array
    {
        return CIIM::findByPriRefs($prirefs);
    }
}
