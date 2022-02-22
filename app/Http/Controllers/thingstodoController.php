<?php

namespace App\Http\Controllers;

use App\Models\ThingsToDo;
use Illuminate\Contracts\View\View;

class thingstodoController extends Controller
{
    /**
     * @return View
     */
    public function index(): View
    {
        $thingstodo = ThingsToDo::listAll();
        return view('thingstodo.index', compact('thingstodo'));
    }
}
