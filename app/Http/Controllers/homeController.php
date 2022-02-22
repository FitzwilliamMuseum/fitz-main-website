<?php

namespace App\Http\Controllers;

use App\Models\Carousels;
use App\Models\Exhibitions;
use App\Models\FundRaising;
use App\Models\Galleries;
use App\Models\Highlights;
use App\Models\HomePage;
use App\Models\NewsArticles;
use App\Models\ResearchProjects;
use App\Models\Shopify;
use App\Models\ThingsToDo;
use Illuminate\Contracts\View\View;
use Psr\SimpleCache\InvalidArgumentException;


class homeController extends Controller
{
    /**
     * @return View
     * @throws InvalidArgumentException
     */
    public function index(): View
    {
        $settings = HomePage::find();
        $carousel = Carousels::findBySection('home');
        $galleries = Galleries::list(3, '?');
        $exhibitions = Exhibitions::listHome('current', '?', 3);
        $news = NewsArticles::feature();
        $research = ResearchProjects::list('?', 3);
        $fundraising = FundRaising::list();
        $objects = Highlights::homeList();
        $things = ThingsToDo::list();
        $shopify = Shopify::list();

        return view('home.index', compact(
            'carousel', 'news', 'research',
            'objects', 'things', 'fundraising',
            'shopify', 'galleries',
            'exhibitions', 'settings'
        ));
    }
}
