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
use App\Models\HomePageBanners;
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
        $exhibitions = Exhibitions::listHome('current', 'tessitura_string', 3);
        $news = NewsArticles::feature();
        $research = ResearchProjects::listSimple('?', 3);
        $fundraising = FundRaising::list(4);
        $objects = Highlights::homeList();
        $things = ThingsToDo::list();
        $shopify = Shopify::list();
        $banners = HomePageBanners::getBanner();
        return view('home.index', compact(
            'carousel', 'news', 'research',
            'objects', 'things', 'fundraising',
            'shopify', 'galleries', 'exhibitions',
            'settings', 'banners'
        ));
    }
}
