<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class collectionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $first = Http::get('https://content.fitz.ms/fitz-website/items/stubs_and_pages?fields=*.*.*&filter[section]=objects-and-artworks&filter[landing_page]=1');
        $pages = $first->json();
        $response = Http::get('https://content.fitz.ms/fitz-website/items/collections?fields=*.*.*&sort=collection_name');
        $collections = $response->json();
        return view('collections.index', compact('collections', 'pages'));
    }

    public function details($slug)
    {
        $response = Http::get('https://content.fitz.ms/fitz-website/items/collections?filter[slug]=' . $slug . '&fields=*.*.*');
        $collection = $response->json();
        return view('collections.details', compact('collection'));
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }


}
