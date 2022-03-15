<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;
use Illuminate\Http\Response;
use App\Models\FindMoreLikeThis;
use App\Models\LookThinkDo;
use App\Models\Stubs;
use App\Models\CIIM;
use App\Models\ResearchProjects;
use App\Models\LearningPages;
use App\Models\StoryTelling;
use App\Models\GalleryFamilyActivities;
use App\Models\SchoolSessions;
use App\Models\StaffProfiles;
use Psr\SimpleCache\InvalidArgumentException;

class learningController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return View|Response
     */
    public function lookthinkdomain(): View|Response
    {
        $ltd = LookThinkDo::list();
        $pages = Stubs::getPage('learning', 'look-think-do');
        if (empty($ltd['data'])) {
            return response()->view('errors.404', [], 404);
        }
        return view('learning.lookthinkdomain', compact('pages', 'ltd'));
    }

    /**
     * Display a Look think do activity
     * @param string $slug The required slug
     * @return View
     */
    public function lookthinkdoactivity(string $slug): View
    {
        $ltd = LookThinkDo::find($slug);
        $adlib = CIIM::findByAccession($ltd['data'][0]['adlib_id_number']);
        return view('learning.lookthinkdoactivity', compact('ltd', 'adlib'));
    }

    /**
     * Display a listing of the resources for learning.
     * @return View
     */
    public function resources(): View
    {
        $pages = Stubs::getLandingBySlug('learning', 'resources');
        $res = LearningPages::filterByResource('Fact Sheets');
        $stages = LearningPages::filterByResourceNotEqual('Fact Sheets');
        return view('learning.resources', compact('pages', 'res', 'stages'));
    }

    /**
     * @param string $slug
     * @return View
     */
    public function resource(string $slug): View
    {
        $res = LearningPages::filterBySlug($slug);
        return view('learning.resource', compact('res'));
    }

    /**
     * @return array
     */
    public static function schoolsessions(): array
    {
        return SchoolSessions::list();
    }

    /**
     * @return array
     */
    public static function families(): array
    {
        return StoryTelling::list();
    }

    /**
     * @return array
     */
    public static function galleryActivities(): array
    {
        return GalleryFamilyActivities::list();
    }

    /**
     * @return array
     */
    public static function youngpeople(): array
    {
        return Stubs::findBySubSection('young-people');
    }

    /**
     * @return array
     */
    public static function adultsessions(): array
    {
        return Stubs::findBySubSection('adult-programming');
    }

    /**
     * @return array
     */
    public static function communitysessions(): array
    {
        return Stubs::findBySubSection('community-programming');
    }

    /**
     * @return array
     */
    public static function research(): array
    {
        return ResearchProjects::findByDepartment();
    }

    /**
     * @param $slug
     * @return View
     */
    public function adult($slug): View
    {
        $session = Stubs::findBySlug($slug);
        return view('learning.adult', compact('session'));
    }

    /**
     * @param $slug
     * @return View
     * @throws InvalidArgumentException
     */
    public function session($slug): View
    {
        $session = SchoolSessions::find($slug);
        $records = FindMoreLikeThis::find($slug, 'pages');
        return view('learning.session', compact('session', 'records'));
    }

    /**
     * @param $slug
     * @return View
     * @throws InvalidArgumentException
     */
    public function community($slug): View
    {
        $pages = Stubs::findBySlug($slug);
        $records = FindMoreLikeThis::find($slug, 'school_sessions');
        return view('learning.community', compact('pages', 'records'));
    }
    /**
     * @param string $slug
     * @return View
     * @throws InvalidArgumentException
     */
    public function young(string $slug): View
    {
        $session = Stubs::findBySlug($slug);
        $records = FindMoreLikeThis::find($slug, 'schoolsessions');
        return view('learning.young', compact('session', 'records'));
    }

    /**
     * @return View
     */
    public function profiles(): View
    {
        $profiles = StaffProfiles::findByDepartment(9);
        return view('learning.profiles', compact('profiles'));
    }

}
