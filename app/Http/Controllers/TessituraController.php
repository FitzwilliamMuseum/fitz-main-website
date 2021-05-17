<?php

namespace App\Http\Controllers;

use App\TessituraApi;

class TessituraController extends Controller
{

    public function getApi(){
      return new TessituraApi;
    }

    public function translateType(string $facility)
    {
      switch ($facility) {
        case 'virtual-bookings':
          $int = 19;
        break;
        case 'general-timed':
          $int = 20;
        break;
          case 'exhibition-timed':
        $int = 21;
        break;
          case 'lecture':
        $int = 56;
        break;
        default:
          $int = 20;
        break;
      }
      return $int;
    }

    public function index()
    {
      $productions = $this->getApi()->getPerformances();
      return view('tessitura.index', compact('productions'));
    }

    public function type(string $facility)
    {
      $productions = $this->getApi()->getPerformances($this->translateType($facility));
      return view('tessitura.type', compact('productions', 'facility'));
    }
}
