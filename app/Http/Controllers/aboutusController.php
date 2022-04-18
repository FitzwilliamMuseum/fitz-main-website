<?php

namespace App\Http\Controllers;

use App\Models\Directors;
use App\Models\Governance;
use App\Models\PressTerms;
use App\Models\SpoliationClaims;
use App\Models\StaffProfiles;
use App\Models\Vacancies;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Pagination\LengthAwarePaginator;

class aboutusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index(): View
    {
        return view('aboutus.index');
    }

    /**
     * Returns a list of directors
     * @return View
     */
    public function directors(): View
    {
        $directors = Directors::getDirectors();
        return view('aboutus.directors', compact('directors'));
    }

    /**
     * Returns a director's profile
     * @param string $slug Page slug to query
     * @return View|Response
     */
    public function director(string $slug): View|Response
    {
        $directors = Directors::getDirector($slug);
        if (empty($directors['data'])) {
            return response()->view('errors.404', [], 404);
        }
        return view('aboutus.director', compact('directors'));
    }


    /**
     * Returns a list of vacancies
     * @return View
     */
    public function vacancies(): View
    {
        $vacancies = Vacancies::getVacancies();
        return view('aboutus.vacancies', compact('vacancies'));
    }

    /**
     * Returns a list of vacancies
     * @return View
     */
    public function archiveVacancies(): View
    {
        $vacancies = Vacancies::getArchived();
        return view('aboutus.archived', compact('vacancies'));
    }

    /**
     * Returns a vacancy
     * @param string $slug Page slug to query
     * @return View|Response
     */
    public function vacancy(string $slug): View|Response
    {
        $vacancies = Vacancies::getVacancy($slug);
        if (empty($vacancies['data'])) {
            return response()->view('errors.404', [], 404);
        }
        return view('aboutus.vacancy', compact('vacancies'));
    }

    /**
     * Returns a listing of all governance documents
     * @return View
     */
    public function governance(): View
    {
        $policy = Governance::getGovernanceByType('Policy');
        $strategy = Governance::getGovernanceByType('Strategy');
        $review = Governance::getGovernanceByType('Review');
        $report = Governance::getGovernanceByType('Report');
        $mission = Governance::getGovernanceByType('Mission');
        $education = Governance::getGovernanceByType('Education Report');
        $research = Governance::getGovernanceByType('Research');
        return view('aboutus.governance', compact(
                'policy', 'strategy', 'review',
                'report', 'mission', 'education',
                'research'
            )
        );
    }

    /**
     * Returns the press release listing, paginated
     * @param Request $request [description]
     * @return View
     */
    public function press(Request $request): View
    {
        $perPage = 6;
        $directus = $this->getApi();
        $directus->setEndpoint('pressroom_files');
        $directus->setArguments(
            array(
                'fields' => '*.*.*',
                'limit' => $perPage,
                'offset' => ($request['page'] - 1) * $perPage,
                'meta' => '*',
                'sort' => '-release_date'
            )
        );
        $press = $directus->getData();
        $currentPage = LengthAwarePaginator::resolveCurrentPage();
        $total = $press['meta']['total_count'];
        $paginator = new LengthAwarePaginator($press, $total, $perPage, $currentPage);
        $paginator->setPath('press-room');
        return view('aboutus.press', compact('press', 'paginator'));
    }

    /**
     * Returns the press release listing, paginated
     * @param Request $request [description]
     * @return View
     */
    public function staff(Request $request): View
    {
        $paginator = StaffProfiles::allstaff($request);
        return view('aboutus.staff', compact('paginator'));
    }

    /**
     * Returns Hockney terms and conditions
     * @return View
     */
    public function hockneyTerms(): View
    {
        $terms = PressTerms::list();
        return view('aboutus.hockney', compact('terms'));
    }

    public function spoliation(Request $request): View
    {
        $claims = SpoliationClaims::list($request );
        return view('aboutus.spoliation', compact('claims'));
    }

    public function spoliationClaim(string $priref): View
    {
        $claims = SpoliationClaims::find($priref);
        return view('aboutus.spoliation-claim', compact('claims'));
    }
}
