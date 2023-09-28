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
use App\Models\HomePageHero;
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
        return view('home.index', [
                'carousel' => Carousels::findBySection('home'),
                'thirdRow' => HomePage::returnThirdRow(),
                'fourthRow' => HomePage::returnFourthRow(),
                // 'news' => NewsArticles::feature(),
                // 'research' => ResearchProjects::listSimple('?', 3),
                // 'objects' => Highlights::homeList(),
                // 'things' => ThingsToDo::list(),
                // 'fundraising' => FundRaising::list(4),
                'shopify' => Shopify::list(),
                'galleries' => Galleries::list(3, '?', 'Open'),
                'exhibitions' => Exhibitions::listHome('current', 'tessitura_string', 3),
                'settings' => HomePage::find(),
                'banners' => HomePageBanners::getBanner(),
                'hero' => HomePageHero::getHeroData()
            ]
        );
    }
}
