<?php

namespace App\Http\Controllers;

use App\TessituraApi;

class tessituraController extends Controller
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


    public function translateEvent(string $slug)
    {
      switch ($slug) {
        case 'the-fitzwilliam-museum':
            $int = 37;
            break;
        case 'exhibitions':
            $int = 42;
            break;
        case 'talks':
            $int = 58;
            break;
        case 'families':
            $int = 60;
            break;
        case 'young-people':
            $int = 61;
            break;
        case 'blind-and-partially-sighted':
            $int = 62;
            break;
        case 'online-events':
            $int = 110;
            break;
        case 'adult-events':
            $int = 116;
            break;
        default:
            $int = 37;
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
      $events = $this->getApi()->getEventTypes();
      $productions = $this->getApi()->getPerformances();
      return view('tessitura.index', compact('events','productions'));
    }

    /**
    * [type description]
    * @param  string $slug [description]
    * @return [type] [description]
    */
    public function type(string $slug)
    {
      $events = $this->getApi()->getEventTypes();
      $productions = $this->getApi()->getPerformances($this->translateEvent($slug));
      return view('tessitura.type', compact('productions', 'slug',  'events'));
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
      $events = $this->getApi()->getEventTypes();
      return view('tessitura.search', compact('productions', 'events'));
    }

    public function validateForm(){
      $this->validate(request(), [
        'location' => 'required',
        'types.*' => 'array|min:1',
        'when' => 'string|min:2',
        date("d/m/Y", strtotime('datefrom')) => 'date_format:d/m/Y',
        date("d/m/Y", strtotime('dateto')) => 'date_format:d/m/Y',
      ]);
    }


}
