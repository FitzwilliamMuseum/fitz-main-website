<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

use App\Models\Carousels;
use App\Models\Galleries;
use App\Models\Exhibitions;
use App\Models\NewsArticles;
use App\Models\ResearchProjects;
use App\Models\FundRaising;
use App\Models\Highlights;
use App\Models\ThingsToDo;
use App\Models\EventsTessitura;
use App\Models\Shopify;



class homeController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $carousel    = Carousels::findBySection('home');
    $galleries   = Galleries::list(3,'?');
    $exhibitions = Exhibitions::list('current', '?', 'exhibition', 3);
    $news        = NewsArticles::list('-publication_date',3);
    $research    = ResearchProjects::list('?', 3);
    $fundraising = FundRaising::list(3);
    $objects     = Highlights::homeList();
    $things      = ThingsToDo::list();
    $productions = EventsTessitura::list();
    $shopify     = Shopify::list();

    return view('index', compact(
      'carousel','news', 'research',
      'objects', 'things', 'fundraising',
      'shopify','productions', 'galleries',
      'exhibitions'
    ));
  }
}
