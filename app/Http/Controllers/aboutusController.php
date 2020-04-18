<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

class aboutusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('aboutus/index');
    }

    public function directors()
    {
      $response = Http::get('https://content.fitz.ms/fitz-website/items/directors?fields=*.*.*');
      $directors = $response->json();
      return view('aboutus.directors', compact('directors'));
    }

    public function press(Request $request)
    {
      $perPage = 6;
      $offset = ($request->page -1) * $perPage ;
      $response = Http::get('https://content.fitz.ms/fitz-website/items/pressroom_files?fields=*.*.*&meta=*&limit=6&offset=' . $offset);
      $press = $response->json();
      $currentPage = LengthAwarePaginator::resolveCurrentPage();
      $total = $press['meta']['total_count'];
      $paginator = new LengthAwarePaginator($press, $total, $perPage, $currentPage);
      $paginator->setPath('press-room');
      return view('aboutus.press', compact('press','paginator'));
    }
}
