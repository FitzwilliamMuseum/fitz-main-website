<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

use App\Models\Exhibitions;
use App\Models\Stubs;
use App\Models\FindMoreLikeThis;
use App\Models\CIIM;
use App\Models\PodcastArchive;
use App\Models\Cases;
use App\Models\Labels;

class exhibitionsController extends Controller
{

  public function index()
  {
    $pages    = Stubs::getLanding('exhibitions');
    $current  = Exhibitions::list($status = 'current');
    $displays = Exhibitions::list('current','-ticketed', 'display', 100);
    $future   = Exhibitions::listFuture('future');
    $archive  = Exhibitions::list($status =  'archived', '-exhibition_end_date', 'exhibition', $limit = 3);
    return view('exhibitions.index', compact(
      'current', 'pages', 'archive',
      'future', 'displays'
    ));
  }

  public function archive()
  {
    $archive = Exhibitions::archive($status =  'archived', '-exhibition_end_date', $limit = 100);
    return view('exhibitions.archives', compact('archive'));
  }

  public function details($slug)
  {
    $exhibitions = Exhibitions::find($slug);
    $adlib = NULL;
    if(!empty($exhibitions['data'])){
      $adlib = CIIM::findByExhibition($exhibitions['data'][0]['adlib_id_exhibition']);
    }
    $records = FindMoreLikeThis::find($slug, 'exhibitions');
    $podcasts = NULL;
    if(!empty($exhibitions['data'][0]['podcasts'] )){
      $podcasts = PodcastArchive::find($exhibitions['data'][0]['podcasts'][0]['podcast_series_id']['id']);
    }
    $cases = Cases::list($exhibitions['data'][0]['id']);
    if(empty($exhibitions['data'])){
      return response()->view('errors.404',[],404);
    }
    return view('exhibitions.details', compact('exhibitions', 'records', 'adlib', 'podcasts', 'cases'));
  }

  public function labels(Request $request)
  {
    $labels = Labels::list($request->segment(5));
    $title = str_replace('-',' ', $request->segment(5));
    return view('exhibitions.labels', compact('labels', 'title'));
  }

  public function label($slug)
  {
    $labels = Labels::find($slug);
    return view('exhibitions.label', compact('labels'));
  }

  public function cases($slug)
  {
    $cases = Cases::find($slug);
    return view('exhibitions.cases', compact('cases'));
  }

  public static function injectImmunity()
  {
    return Exhibitions::immunity();
  }

  public static function injectLoanImmunity()
  {
    return Exhibitions::loanImmunity();
  }
}
