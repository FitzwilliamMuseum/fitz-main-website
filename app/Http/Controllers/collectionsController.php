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
        $response = Http::get('https://content.fitz.ms/fitz-website/items/collections?fields=*.*.*&sort=-id');
        $collections = $response->json();
        return view('collections.index', compact('collections'));
    }

    public function details($slug)
    {
        $response = Http::get('https://content.fitz.ms/fitz-website/items/collections?filter[slug]=' . $slug . '&fields=*.*.*');
        $collection = $response->json();
        // dd($collection);
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
