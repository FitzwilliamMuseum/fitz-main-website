<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class learningController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function lookthinkdomain()
    {
        $response = Http::get('https://content.fitz.ms/fitz-website/items/look_think_do?fields=*.*.*');
        $ltd = $response->json();
        return view('learning.lookthinkdomain', compact('ltd'));
    }

    public function lookthinkdoactivity($slug)
    {
        $response = Http::get('https://content.fitz.ms/fitz-website/items/look_think_do?filter[slug]=' . $slug . '&fields=*.*.*');
        $ltd = $response->json();
        return view('learning.lookthinkdoactivity', compact('ltd'));
    }

    public function resources()
    {
        $response = Http::get('https://content.fitz.ms/fitz-website/items/stubs_and_pages?fields=*.*&filter[section][eq]=learning&meta=*&filter[landing_page][nnull]&filter[slug][eq]=resources');
        $ltd = $response->json();
        $resources = Http::get('https://content.fitz.ms/fitz-website/items/learning_pages?fields=*.*.*.*');
        $res = $resources->json();
        return view('learning.resources', compact('ltd', 'res'));
    }
    public function resource($slug)
    {
        $resources = Http::get('https://content.fitz.ms/fitz-website/items/learning_pages?fields=*.*.*.*&filter[slug][eq]=' . $slug);
        $res = $resources->json();
        return view('learning.resource', compact('res'));
    }
}
