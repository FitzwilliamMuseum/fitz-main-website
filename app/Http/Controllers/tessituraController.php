<?php

namespace App\Http\Controllers;

use App\TessituraApi;
use GuzzleHttp\Exception\GuzzleException;
use Illuminate\Contracts\View\View;
use Illuminate\Validation\ValidationException;
use JetBrains\PhpStorm\Pure;

class tessituraController extends Controller
{
    /**
     * @param string $facility
     * @return int
     */
    public function translateType(string $facility): int
    {
        return match ($facility) {
            'virtual-bookings' => 19,
            'exhibition-timed' => 21,
            'lecture' => 56,
            'fff-tours-2pm' => 66,
            'fff-tours-3pm' => 76,
            'fff-dragon-dance' => 116,
            'fff-storytelling-230pm' => 86,
            'fff-storytelling-330pm' => 96,
            'grove-lodge-garden' => 157,
            default => 20,
        };
    }

    /**
     * @return View
     * @throws GuzzleException
     */
    public function index(): View
    {
        $events = $this->getTessituraApi()->getEventTypes();
        $productions = $this->getTessituraApi()->getPerformances();
        return view('tessitura.index', compact('events', 'productions'));
    }

    /**
     * @return TessituraApi
     */
    #[Pure] public function getTessituraApi(): TessituraApi
    {
        return new TessituraApi;
    }

    /**
     * @param string $slug
     * @return View
     * @throws GuzzleException
     */
    public function type(string $slug): View
    {
        $events = $this->getTessituraApi()->getEventTypes();
        $productions = $this->getTessituraApi()->getPerformances($this->translateEvent($slug));
        return view('tessitura.type', compact('productions', 'slug', 'events'));
    }



    /**
     * @param string $slug
     * @return int
     */
    public function translateEvent(string $slug):int
    {
        return match ($slug) {
            'exhibitions' => 42,
            'talks' => 58,
            'families' => 60,
            'young-people' => 61,
            'blind-and-partially-sighted' => 62,
            'online-events' => 110,
            'adult-events' => 116,
            default => 37,
        };
    }

    /**
     * @return View
     * @throws GuzzleException
     * @throws ValidationException
     */
    public function search(): View
    {
        $this->validateForm();
        $prods = $this->getTessituraApi();
        $prods->setPerformanceStartDate(request('datefrom'));
        $prods->setPerformanceEndDate(request('dateto'));
        $prods->setFacilities(request('location'));
        $productions = $prods->getPerformancesSearch();
        $events = $this->getTessituraApi()->getEventTypes();
        return view('tessitura.search', compact('productions', 'events'));
    }

    /**
     * @return void
     * @throws ValidationException
     */
    public function validateForm()
    {
        $this->validate(request(), [
            'location' => 'required',
            'types.*' => 'array|min:1',
            'when' => 'string|min:2',
            date("d/m/Y", strtotime('datefrom')) => 'date_format:d/m/Y',
            date("d/m/Y", strtotime('dateto')) => 'date_format:d/m/Y',
        ]);
    }


}
