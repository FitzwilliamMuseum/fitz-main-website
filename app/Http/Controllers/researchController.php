<?php

namespace App\Http\Controllers;

use App\Models\AffiliateResearchers;
use App\Models\FindMoreLikeThis;
use App\Models\OnlineResources;
use App\Models\ResearchOpportunities;
use App\Models\ResearchProjects;
use App\Models\StaffProfiles;
use App\Models\ExternalCurators;
use App\Models\Stubs;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Psr\SimpleCache\InvalidArgumentException;

class researchController extends Controller
{
    /**
     * @return View
     */
    public function index(): View
    {
        $pages = Stubs::getLandingBySection('research');
        $associated = Stubs::getAssociated('research');
        return view('research.index', compact('pages', 'associated'));
    }

    /**
     * @param Request $request
     * @return View
     */
    public function projects(Request $request): View
    {
        $projects = ResearchProjects::list($request);
        return view('research.projects', compact('projects'));
    }

    /**
     * @param string $slug
     * @return View|Response
     * @throws InvalidArgumentException
     */
    public function project(string $slug): View|Response
    {
        $project = ResearchProjects::find($slug);
        if (empty($project['data'])) {
            return response()->view('errors.404', [], 404);
        } else {
            return view('research.project', [
                'project' => Collect($project['data'])->first(),
                'records' => FindMoreLikeThis::find($slug, 'projects')
            ]);
        }
    }

    /**
     * @param Request $request
     * @return View
     */
    public function profiles(Request $request): View
    {
        $profiles = StaffProfiles::list($request);
        return view('research.profiles', compact('profiles'));
    }

    /**
     * @param string $slug
     * @return View|Response
     * @throws InvalidArgumentException
     */
    public function affiliatedResearcher(string $slug): View|Response
    {
        $profile = AffiliateResearchers::find($slug);
        if (empty($profile['data'])) {
            return response()->view('errors.404', [], 404);
        } else {
            return view('research.affiliate', [
                'profile' => Collect($profile['data'])->first(),
                'similar' => FindMoreLikeThis::find($slug, 'affiliate')
            ]);
        }
    }

    /**
     * @return View
     */
    public function affiliates(): View
    {
        $profiles = AffiliateResearchers::list();
        return view('research.affiliates', compact('profiles'));
    }

    /**
     * @param string $slug
     * @return View|Response
     * @throws InvalidArgumentException
     */
    public function profile(string $slug): View|Response
    {
        $profile = StaffProfiles::find($slug);
        if (empty($profile['data'])) {
            return response()->view('errors.404', [], 404);
        } else {
            return view('research.profile', [
                'profile' => Collect($profile['data'])->first(),
                'similar' => FindMoreLikeThis::find($slug, 'staffProfile')
            ]);
        }
    }

    /**
     * @param string $slug
     * @return View|Response
     */
    public function resource(string $slug): View|Response
    {
        $resources = OnlineResources::find($slug);
        if (empty($resources['data'])) {
            return response()->view('errors.404', [], 404);
        } else {
            return view('research.resource', ['resources' => Collect($resources['data'])->first()]);
        }
    }

    /**
     * @param Request $request
     * @return View
     */
    public function resources(Request $request): View
    {
        $resources = OnlineResources::list($request);
        return view('research.resources', compact('resources'));
    }

    /**
     * @param string $slug
     * @return View|Response
     */
    public function opportunity(string $slug): View|Response
    {
        $opportunity = ResearchOpportunities::find($slug);
        if (empty($opportunity['data'])) {
            return response()->view('errors.404', [], 404);
        } else {
            return view('research.opportunity', ['opportunity' => Collect($opportunity['data'])->first()]);
        }
    }

    /**
     * @return View
     */
    public function opportunities(): View
    {
        $opportunities = ResearchOpportunities::list();
        return view('research.opportunities', compact('opportunities'));
    }

    /**
     * @param Request $request
     * @return View
     */
    public function externalCurators(Request $request): view
    {
        $curators = ExternalCurators::list($request);
        return view('research.external-curators', compact('curators'));
    }
}
