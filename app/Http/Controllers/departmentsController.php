<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;


class departmentsController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
      $response = Http::get('https://content.fitz.ms/fitz-website/items/departments?fields=*.*.*&sort=-id');
      $departments = $response->json();
      return view('departments.index', compact('departments'));
  }

  public function details($slug)
  {
      $response = Http::get('https://content.fitz.ms/fitz-website/items/departments?filter[slug]=' . $slug . '&fields=*.*.*');
      $departments = $response->json();
      return view('departments.details', compact('departments'));
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
