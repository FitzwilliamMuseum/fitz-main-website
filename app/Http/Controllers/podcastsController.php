<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\DirectUs;
use App\MoreLikeThis;

use App\Models\FindMoreLikeThis;
use App\Models\CIIM;
use App\Models\MindsEye;
use App\Models\PodcastSeries;
use App\Models\PodcastArchive;

class podcastsController extends Controller
{
  /**
  * Display a listing of the resource.
  *
  * @return \Illuminate\Http\Response
  */

  public function index()
  {
    $podcasts = PodcastSeries::list();
    return view('podcasts.index', compact('podcasts'));
  }

  public function series($slug)
  {
    $ids = PodcastSeries::getSeriesID($slug);
    $podcasts = PodcastArchive::find($ids['data'][0]['id']);
    if(empty($podcasts['data'])){
      return response()->view('errors.404',[],404);
    }
    return view('podcasts.series', compact('podcasts'));
  }

  public function episode($slug)
  {
    $podcasts = PodcastArchive::findByEpisode($slug);
    if(empty($podcasts['data'])){
      return response()->view('errors.404',[],404);
    }
    return view('podcasts.episode', compact('podcasts'));
  }

  public function mindseyes(Request $request)
  {
    $mindseyes = MindsEye::list($request);
    return view('podcasts.mindseyes', compact('mindseyes'));
  }

  public function mindseye($slug)
  {
    $mindseye = MindsEye::find($slug);
    $adlib = CIIM::findByAccession($mindseye['data'][0]['adlib_id']);
    $suggest = FindMoreLikeThis::find($slug, 'podcasts');
    if(empty($mindseye['data'])){
      return response()->view('errors.404',[],404);
    }
    return view('podcasts.mindseye', compact('mindseye', 'adlib', 'suggest'));
  }

}
