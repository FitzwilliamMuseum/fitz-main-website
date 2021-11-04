<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Collection;
use Illuminate\Pagination\LengthAwarePaginator;
use App\Models\Directors;
use App\Models\Vacancies;
use App\Models\Governance;
use App\Models\FindMoreLikeThis;

class aboutusController extends Controller
{
  /**
  * Display a listing of the resource.
  *
  * @return \Illuminate\Http\Response
  */
  public function index()
  {
    return view('aboutus.index');
  }

  /**
   * Returns a list of directors
   * @return \Illuminate\Http\Response
   */
  public function directors()
  {
    $directors = Directors::getDirectors();
    return view('aboutus.directors', compact('directors'));
  }

  /**
   * Returns a director's profile
   * @param  string $slug Page slug to query
   * @return \Illuminate\Http\Response
   */
  public function director(string $slug)
  {
    $directors = Directors::getDirector($slug);
    if(empty($directors['data'])){
      return response()->view('errors.404',[],404);
    }
    return view('aboutus.director', compact('directors'));
  }


  /**
   * Returns a list of vacancies
   * @return \Illuminate\Http\Response
   */
  public function vacancies()
  {
    $vacancies = Vacancies::getVacancies();
    return view('aboutus.vacancies', compact('vacancies'));
  }

  /**
   * Returns a list of vacancies
   * @return \Illuminate\Http\Response
   */
  public function archiveVacancies()
  {
    $vacancies = Vacancies::getArchived();
    return view('aboutus.archived', compact('vacancies'));
  }
  /**
   * Returns a vacancy
   * @param  string $slug Page slug to query
   * @return \Illuminate\Http\Response
   */
  public function vacancy(string $slug)
  {
    $vacancies = Vacancies::getVacancy($slug);
    if(empty($vacancies['data'])){
      return response()->view('errors.404',[],404);
    }
    return view('aboutus.vacancy', compact('vacancies'));
  }

  /**
   * Returns a listing of all governance documents
   * @return \Illuminate\Http\Response
   */
  public function governance()
  {
    $gov = Governance::getGovernance();
    return view('aboutus.governance', compact('gov'));
  }

  /**
   * Returns the press release listing, paginated
   * @param  Request $request [description]
   * @return \Illuminate\Http\Response
   */
  public function press(Request $request)
  {
    $perPage = 6;
    $directus = $this->getApi();
    $directus->setEndpoint('pressroom_files');
    $directus->setArguments(
      $args = array(
        'fields' => '*.*.*',
        'limit' => $perPage,
        'offset' => ($request->page -1) * $perPage,
        'meta' => '*',
        'sort' => '-release_date'
      )
    );
    $press = $directus->getData();
    $currentPage = LengthAwarePaginator::resolveCurrentPage();
    $total = $press['meta']['total_count'];
    $paginator = new LengthAwarePaginator($press, $total, $perPage, $currentPage);
    $paginator->setPath('press-room');
    return view('aboutus.press', compact('press','paginator'));
  }
}
