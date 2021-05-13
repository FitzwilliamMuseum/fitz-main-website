<?php

namespace App\Http\Controllers;

use App\TessituraApi;

class TessituraController extends Controller
{

    public function getApi(){
      return new TessituraApi;
    }
    public function index()
    {
      $productions = $this->getApi()->getPerformances();
      return view('tessitura.index', compact('productions'));
    }
}
