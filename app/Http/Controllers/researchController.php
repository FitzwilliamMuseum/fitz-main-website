<?php

namespace App\Http\Controllers;

use App\Models\AffiliateResearchers;
use App\Models\FindMoreLikeThis;
use App\Models\OnlineResources;
use App\Models\ResearchOpportunities;
use App\Models\ResearchProjects;
use App\Models\StaffProfiles;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Response;
use Psr\SimpleCache\InvalidArgumentException;

class researchController extends Controller
{
    /**
     * @return View
     */
    public function index(): View
    {
        $api = $this->getApi();
        $api->setEndpoint('stubs_and_pages');
        $api->setArguments(
            array(
                'fields' => '*.*.*.*',
                'meta' => 'result_count,total_count,type',
                'filter[landing_page][eq]' => '1',
                'filter[section][eq]' => 'research',
            )
        );
        $pages = $api->getData();

        $apiRes = $this->getApi();
        $apiRes->setEndpoint('stubs_and_pages');
        $apiRes->setArguments(
            array(
                'fields' => '*.*.*.*',
                'meta' => 'result_count,total_count,type',
                'filter[landing_page][null]' => '',
                'filter[section][eq]' => 'research',
                'filter[associate_with_landing_page][eq]' => '1'
            )
        );
        $associated = $apiRes->getData();
        return view('research.index', compact('pages', 'associated'));
    }

    /**
     * @return View
     */
    public function projects(): View
    {
        $projects = ResearchProjects::list();
        return view('research.projects', compact('projects'));
    }

    /**
     * @param string $slug
     * @return View|Response
     * @throws InvalidArgumentException
     */
    public function project(string $slug): View|Response
    {
        $projects = ResearchProjects::find($slug);
        $records = FindMoreLikeThis::find($slug, 'projects');
        if (empty($projects['data'])) {
            return response()->view('errors.404', [], 404);
        }

        return view('research.project', compact('projects', 'records'));
    }

    /**
     * @return View
     */
    public function profiles(): View
    {
        $profiles = StaffProfiles::list();
        return view('research.profiles', compact('profiles'));
    }

    /**
     * @param string $slug
     * @return View|Response
     * @throws InvalidArgumentException
     */
    public function affiliate(string $slug): View|Response
    {
        $profiles = AffiliateResearchers::find($slug);
        if (empty($profiles['data'])) {
            return response()->view('errors.404', [], 404);
        }
        $similar = FindMoreLikeThis::find($slug, 'affiliate');
        return view('research.affiliate', compact('profiles', 'similar'));
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
        $profiles = StaffProfiles::find($slug);
        if (empty($profiles['data'])) {
            return response()->view('errors.404', [], 404);
        }
        $similar = FindMoreLikeThis::find($slug, 'staffProfile');
        return view('research.profile', compact('profiles', 'similar'));
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
        }
        return view('research.resource', compact('resources'));
    }

    /**
     * @return View
     */
    public function resources(): View
    {
        $resources = OnlineResources::list();
        return view('research.resources', compact('resources'));
    }

    /**
     * @param string $slug
     * @return View|Response
     */
    public function opportunity(string $slug): View|Response
    {
        $opportunities = ResearchOpportunities::find($slug);
        if (empty($opportunities['data'])) {
            return response()->view('errors.404', [], 404);
        }
        return view('research.opportunity', compact('opportunities'));
    }

    /**
     * @return View
     */
    public function opportunities(): View
    {
        $opportunities = ResearchOpportunities::list();
        return view('research.opportunities', compact('opportunities'));
    }
}
