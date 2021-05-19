<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Collection;
use Illuminate\Pagination\LengthAwarePaginator;
use App\DirectUs;

class aboutusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('aboutus.index');
    }

    public function directors()
    {
      $directus = new DirectUs;
      $directus->setEndpoint('directors');
      $directors = $directus->getData();
      return view('aboutus.directors', compact('directors'));
    }

    public function director($slug)
    {
      $directus = new DirectUs;
      $directus->setEndpoint('directors');
      $directus->setArguments(
        $args = array(
            'fields' => '*.*.*',
            'meta' => 'result_count,total_count,type',
            'filter[slug][eq]' => $slug
        )
      );
      $directors = $directus->getData();
      return view('aboutus.director', compact('directors'));
    }

    public function governance()
    {
      $directus = new DirectUs;
      $directus->setEndpoint('governance_files');
      $directus->setArguments(
        $args = array(
            'fields' => '*.*.*',
            'meta' => 'result_count,total_count,type'
        )
      );
      $gov = $directus->getData();
      return view('aboutus.governance', compact('gov'));
    }

    public function press(Request $request)
    {
      $perPage = 6;
      $directus = new DirectUs;
      $directus->setEndpoint('pressroom_files');
      $directus->setArguments(
        $args = array(
            'fields' => '*.*.*',
            'limit' => 6,
            'offset' => ($request->page -1) * $perPage ,
            'meta' => 'result_count,total_count,type',
            'sort' => '-release_date'
        )
      );
      $press = $directus->getData();
      $currentPage = LengthAwarePaginator::resolveCurrentPage();
      $total = $press['meta']['total_count'];
      $paginator = new LengthAwarePaginator($press, $total, $perPage, $currentPage);
      $paginator->setPath('press-room');
      return view('aboutus.press', compact('press','paginator'));
    }
}
