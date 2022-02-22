<?php

namespace App\Http\Controllers;

use App\Models\FindMoreLikeThis;
use App\Models\NewsArticles;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Psr\SimpleCache\InvalidArgumentException;

class newsController extends Controller
{
    /**
     * @param Request $request
     * @return View
     */
    public function index(Request $request): View
    {
        $paginator = NewsArticles::paginateNews($request);
        $news = $paginator->items();
        return view('news.index', compact('news', 'paginator'));
    }

    /**
     * @param string $slug
     * @return View|Response
     * @throws InvalidArgumentException
     */
    public function article(string $slug): View|Response
    {
        $news = NewsArticles::find($slug);
        $records = FindMoreLikeThis::find($slug, 'news');
        if (empty($news['data'])) {
            return response()->view('errors.404', [], 404);
        }
        return view('news.article', compact('news', 'records'));
    }
}
