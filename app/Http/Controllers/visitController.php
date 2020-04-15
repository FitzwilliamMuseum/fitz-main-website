<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class visitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $response = Http::get('https://content.fitz.ms/fitz-website/items/stubs_and_pages?fields=*.*&filter[section][eq]=visit-us&meta=*&filter[landing_page][null]&filter[associate_with_landing_page][eq]=1');
        $associated = $response->json();
        $response = Http::get('https://content.fitz.ms/fitz-website/items/stubs_and_pages?fields=*.*.*&filter[section]=visit-us&filter[landing_page]=1');
        $pages = $response->json();
        $request_five = Http::get('https://content.fitz.ms/fitz-website/items/directions?fields=*.*&sort=-id&limit=3');
        $directions = $request_five->json();
        return view('visit/index', compact('pages', 'associated', 'directions'));
    }

}
