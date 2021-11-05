<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\ThingsToDo;

class thingstodoController extends Controller
{
  public function index()
  {
    $thingstodo = ThingsToDo::listAll(100);
    return view('thingstodo.index', compact('thingstodo'));
  }
}
