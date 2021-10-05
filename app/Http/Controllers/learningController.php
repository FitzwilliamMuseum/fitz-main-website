<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

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

class learningController extends Controller
{
  /**
  * Display a listing of the resource.
  *
  * @return \Illuminate\Http\Response
  */

  public function lookthinkdomain()
  {
    $ltd = LookThinkDo::list();
    $pages = Stubs::getPage('learning', 'look-think-do');
    if(empty($ltd['data'])){
      return response()->view('errors.404',[],404);
    }
    return view('learning.lookthinkdomain', compact('pages','ltd'));
  }

  public function lookthinkdoactivity(string $slug)
  {
    $ltd = LookThinkDo::find($slug);
    $adlib = CIIM::findByAccession($ltd['data'][0]['adlib_id_number']);
    return view('learning.lookthinkdoactivity', compact('ltd', 'adlib'));
  }

  public function resources()
  {
    $pages = Stubs::getLandingBySlug('learning', 'resources');
    $res = LearningPages::filterByResource('Fact Sheets');
    $stages = LearningPages::filterByResourceNotEqual('Fact Sheets');
    return view('learning.resources', compact('pages', 'res', 'stages'));
  }

  public function resource(string $slug)
  {
    $res = LearningPages::filterBySlug($slug);
    return view('learning.resource', compact('res'));
  }

  public static function schoolsessions()
  {
    return SchoolSessions::list();
  }

  public static function families()
  {
    return StoryTelling::list();
  }

  public static function galleryActivities()
  {
    return GalleryFamilyActivities::list();
  }


  public static function youngpeople()
  {
    return Stubs::findBySubSection('young-people');
  }


  public static function adultsessions()
  {
    return Stubs::findBySubSection('adult-programming');
  }

  public static function research()
  {
    return ResearchProjects::findByDepartment('Learning');
  }

  public function adult($slug)
  {
    $session = Stubs::findBySlug($slug);
    return view('learning.adult', compact('session'));
  }

  public function session($slug)
  {
    $session = SchoolSessions::find($slug);
    $records = FindMoreLikeThis::find($slug, 'school_sessions');
    return view('learning.session', compact('session','records'));
  }

  public function young(string $slug)
  {
    $session = Stubs::findBySlug($slug);
    $records = FindMoreLikeThis::find($slug, 'schoolsessions');
    return view('learning.young', compact('session','records'));
  }

  public function profiles()
  {
    $profiles = StaffProfiles::findByDepartment(9);
    return view('learning.profiles', compact('profiles'));
  }

}
