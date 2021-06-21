<?php

namespace App\Http\Controllers;

use App\TessituraApi;

class TessituraController extends Controller
{
    /**
     * [getApi description]
     * @return [type] [description]
     */
    public function getApi(){
      return new TessituraApi;
    }

    /**
     * [translateType description]
     * @param  string $facility [description]
     * @return [type]           [description]
     */
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
        case 'fff-tours-2pm':
        $int = 66;
        break;
        case 'fff-tours-3pm':
        $int = 76;
        break;
        case 'fff-dragon-dance':
        $int = 116;
        break;
        case 'fff-storytelling-230pm':
        $int = 86;
        break;
        case 'fff-storytelling-330pm':
        $int = 96;
        break;
        case 'grove-lodge-garden':
        $int = 157;
        break;
        default:
        $int = 20;
        break;
      }
      return $int;
    }

    /**
     * [index description]
     * @return [type] [description]
     */
    public function index()
    {
      $productions = $this->getApi()->getPerformances();
      return view('tessitura.index', compact('productions'));
    }

    /**
     * [type description]
     * @param  string $facility [description]
     * @return [type]           [description]
     */
    public function type(string $facility)
    {
      $productions = $this->getApi()->getPerformances($this->translateType($facility));
      return view('tessitura.type', compact('productions', 'facility'));
    }
    /**
     * [search description]
     * @param  array  $params [description]
     * @return [type]         [description]
     */
    public function search()
    {
      $this->validateForm();
      $prods = $this->getApi();
      $prods->setPerformanceStartDate(request('datefrom'));
      $prods->setPerformanceEndDate(request('dateto'));
      $prods->setFacilities(request('location'));
      $productions = $prods->getPerformancesSearch();
      return view('tessitura.search', compact('productions'));
    }

    public function validateForm(){
      $this->validate(request(), [
          'location' => 'required',
          'types.*' => 'array|min:1',
          'when' => 'string|min:2',
           date("d/m/Y", strtotime('datefrom')) => 'date_format:d/m/Y',
           date("d/m/Y", strtotime('dateto')) => 'date_format:d/m/Y',        ]);
    }
}
