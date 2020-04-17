<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;


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
}
