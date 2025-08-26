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
    public function lookThinkDoMain(): View|Response
    {
        $ltd = LookThinkDo::list();
        $page = Stubs::getPage('learn-with-us', 'look-think-do');
        if (empty($ltd['data'])) {
            return response()->view('errors.404', [], 404);
        } else {
            return view('learning.lookthinkdomain',
                [
                    'page' => Collect($page['data'])->first(),
                    'ltd' => Collect($ltd['data']),
                ]);
        }
    }

    /**
     * Display a Look think do activity
     * @param string $slug The required slug
     * @return View|Response
     */
    public function lookThinkDoActivity(string $slug): View|Response
    {
        $ltd = LookThinkDo::find($slug);
        if (empty($ltd['data'])) {
            return response()->view('errors.404', [], 404);
        } else {
            $activity = Collect($ltd['data'])->first();
            $adlib = CIIM::findByAccession($activity['adlib_id_number']);
            return view('learning.lookthinkdoactivity', ['ltd' => $activity, 'adlib' => $adlib]);
        }

    }

    /**
     * Display a listing of the resources for learning.
     * @return View
     */
    public function resources(): View
    {
        $pages = Stubs::getLandingBySlug('learn-with-us', 'resources');
        $res = LearningPages::filterByResource('Fact Sheets');
        $stages = LearningPages::filterByResourceNotEqual('Fact Sheets');
        return view('learning.resources', compact('pages', 'res', 'stages'));
    }

    /**
     * @param string $slug
     * @return View|Response
     */
    public function resource(string $slug): View|Response
    {
        $resource = LearningPages::filterBySlug($slug);
        if (empty($resource['data'])) {
            return response()->view('errors.404', [], 404);
        } else {
            return view('learning.resource', ['resource' => Collect($resource['data'])->first()]);

        }
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
     * @return View|Response
     */
    public function adult($slug): View|Response
    {
        $session = Stubs::findBySlug($slug);
        if(empty($session['data'])) {
            return response()->view('errors.404', [], 404);
        } else {
            return view('learning.adult', ['session' => Collect($session['data'])->first()]);
        }
    }

    /**
     * @param $slug
     * @return View|Response
     * @throws InvalidArgumentException
     */
    public function session($slug): View|Response
    {
        $session = SchoolSessions::find($slug);
        if (empty($session['data'])) {
            return response()->view('errors.404', [], 404);
        } else {
            $records = FindMoreLikeThis::find($slug, 'pages');
            return view('learning.session', ['session' => Collect($session['data'])->first(), 'records' => $records]);
        }

    }

    /**
     * @param $slug
     * @return View|Response
     * @throws InvalidArgumentException
     */
    public function community($slug): View|Response
    {
        $pages = Stubs::findBySlug($slug);
        if(empty($pages['data'])){
            return response()->view('errors.404', [], 404);
        } else {
            $records = FindMoreLikeThis::find($slug, 'pages');
            return view('learning.community', [
                'page' => Collect($pages['data'])->first(),
                'records' => $records]
            );
        }
    }

    /**
     * @param string $slug
     * @return View|Response
     * @throws InvalidArgumentException
     */
    public function young(string $slug): View|Response
    {
        $session = Stubs::findBySlug($slug);
        if(empty($session['data'])){
            return response()->view('errors.404', [], 404);
        } else {
            $records = FindMoreLikeThis::find($slug, 'pages');
            return view('learning.young', ['session' => Collect($session['data'])->first(), 'records' => $records]);
        }
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
