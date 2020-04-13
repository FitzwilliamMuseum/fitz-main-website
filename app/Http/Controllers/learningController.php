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
    public function index()
    {
        return view('learning/index');
    }

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
}
