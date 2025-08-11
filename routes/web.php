<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'homeController@index')->name('home');
Route::feeds();
/*
About us routes
*/
Route::get('about-us/our-directors', 'aboutusController@directors')->name('directors');
Route::get('about-us/directors', 'aboutusController@directors')->name('directors-redirect');
Route::get('about-us/directors/{slug}', 'aboutusController@director')->name('director');
Route::get('about-us/press-room', 'aboutusController@press')->name('press-room');
Route::get('about-us/governance-policies-and-reports', 'aboutusController@governance')->name('governance');
Route::get('about-us/work-with-us', 'aboutusController@vacancies')->name('vacancies');
Route::get('about-us/work-with-us/details/{slug}', 'aboutusController@vacancy')->name('vacancy');
Route::get('about-us/work-with-us/archive/', 'aboutusController@archiveVacancies')->name('vacancy.archive');
Route::get('about-us/terms/hockney/', 'aboutusController@hockneyTerms')->name('press.hockney');


Route::get('about-us/collections', 'collectionsController@index')->name('collections');
Route::get('about-us/collections/{slug}/', 'collectionsController@details')->name('collection');
Route::get('about-us/departments/', 'departmentsController@index')->name('departments');
Route::get('about-us/departments/{slug}', 'departmentsController@details')->name('department');
Route::get('about-us/departments/conservation-and-collections-care/{slug}', 'departmentsController@conservation')->name('conservation-care');
Route::get('about-us/our-staff', 'aboutusController@staff')->name('about.our.staff');

/*
Research section routes
*/
Route::get('research/', 'researchController@index')->name('research');
Route::get('research/research-and-impact', 'researchController@index')->name('research-impact');
Route::get('research/projects/', 'researchController@projects')->name('research-projects');
Route::get('research/projects/{slug}/', 'researchController@project')->name('research-project');
Route::get('research/active-researchers', 'researchController@profiles')->name('research-profiles');
Route::get('about-us/our-staff/profile/{slug}', 'researchController@profile')->name('research-profile');
# Research Affiliates
Route::get('research/affiliates/{slug}', 'researchController@affiliatedResearcher')->name('research-affiliate');
Route::get('research/affiliates', 'researchController@affiliates')->name('research-affiliates');

Route::get('research/external-curators/{slug}', 'exhibitionsController@externals')->name('exhibition-externals');
Route::get('research/external-curators','researchController@externalCurators')->name('exhibition-externals-list');

Route::get('research/online-resources/', 'researchController@resources')->name('resources');
Route::get('research/online-resources/{slug}', 'researchController@resource')->name('resource');
Route::get('research/opportunities/', 'researchController@opportunities')->name('opportunities');
Route::get('research/opportunities/{slug}', 'researchController@opportunity')->name('opportunity');
/*
Visit us Route
*/
// Route::get('plan-your-visit/', 'visitController@index')->name('visit');
// Route::get('plan-your-visit/frequently-asked-questions','visitController@faqs')->name('visit.faqs');
Route::get('plan-your-visit/group-visits','visitController@groupVisits')->name('visit.groupvisits');

Route::get('/galleries', function () {
    return redirect('plan-your-visit/galleries');
});

Route::get('/exhibitions', function () {
    return redirect('plan-your-visit/exhibitions');
});

Route::get('plan-your-visit/exhibitions/archive', function () {
    return redirect('plan-your-visit/past-exhibitions-and-displays');
});

Route::get('plan-your-visit/galleries', 'galleriesController@index')->name('galleries');
Route::get('plan-your-visit/galleries/{slug}', 'galleriesController@gallery')->name('gallery');
Route::get('plan-your-visit/past-exhibitions-and-displays', 'exhibitionsController@archive')->name('archive');
Route::get('plan-your-visit/exhibitions/', 'exhibitionsController@index')->name('exhibitions');
Route::get('plan-your-visit/exhibitions/future', 'exhibitionsController@future')->name('future');
Route::get('plan-your-visit/exhibitions/{slug}', 'exhibitionsController@details')->name('exhibition');
Route::get('plan-your-visit/exhibitions/{exhibition}/cases/{slug}', 'exhibitionsController@labels')->name('exhibition.labels');
Route::get('plan-your-visit/exhibitions/{exhibition}/cases/', 'exhibitionsController@cases')->name('exhibition.cases');
Route::get('plan-your-visit/exhibitions/labels/{slug}', 'exhibitionsController@label')->name('exhibition.label');

// New Landing Page Template
Route::get('/support-us', 'landingPageController@index')->name('support-us');
Route::get('/support-us/{slug}', 'subpagesController@index')->name('subpage');
Route::get('/plan-your-visit', 'landingPageController@index')->name('visit');
Route::get('/plan-your-visit/{slug}', 'visitController@getSubpage')->name('visit-subpage');

/** True to Nature routes */
Route::get('plan-your-visit/exhibitions/true-to-nature-open-air-painting-in-europe-1780-1870/artists', 'exhibitionsController@ttnArtists')->name('exhibition.ttn.artists');
Route::get('plan-your-visit/exhibitions/true-to-nature-open-air-painting-in-europe-1780-1870/artists/{slug}', 'exhibitionsController@ttnArtist')->name('exhibition.ttn.artist');
Route::get('plan-your-visit/exhibitions/true-to-nature-open-air-painting-in-europe-1780-1870/labels', 'exhibitionsController@ttnLabels')->name('exhibition.ttn.labels');
Route::get('plan-your-visit/exhibitions/true-to-nature-open-air-painting-in-europe-1780-1870/labels/{slug}', 'exhibitionsController@ttnLabel')->name('exhibition.ttn.label');
Route::get('plan-your-visit/exhibitions/true-to-nature-open-air-painting-in-europe-1780-1870/iiif/{slug}', 'exhibitionsController@ttniif')->name('exhibition.ttn.iiif');
Route::get('plan-your-visit/exhibitions/true-to-nature-open-air-painting-in-europe-1780-1870/geojson', 'exhibitionsController@ttnGeoJson')->name('exhibition.ttn.geoJson');
Route::get('plan-your-visit/exhibitions/true-to-nature-open-air-painting-in-europe-1780-1870/geojson.ld', 'exhibitionsController@linkedPasts')->name('exhibition.ttn.geoJson.ld');
Route::get('plan-your-visit/exhibitions/true-to-nature-open-air-painting-in-europe-1780-1870/births.ld', 'exhibitionsController@linkedPastsBirths')->name('exhibition.ttn.geoJson.ld.births');
Route::get('plan-your-visit/exhibitions/true-to-nature-open-air-painting-in-europe-1780-1870/deaths.ld', 'exhibitionsController@linkedPastsDeaths')->name('exhibition.ttn.geoJson.ld.deaths');
Route::get('plan-your-visit/exhibitions/true-to-nature-open-air-painting-in-europe-1780-1870/peripleo', 'exhibitionsController@peripleo')->name('exhibition.ttn.geoJson.ld.peripleo');

Route::get('plan-your-visit/exhibitions/true-to-nature-open-air-painting-in-europe-1780-1870/mapped', 'exhibitionsController@ttnMap')->name('exhibition.ttn.mapped');
Route::get('plan-your-visit/exhibitions/true-to-nature-open-air-painting-in-europe-1780-1870/viewpoints', 'exhibitionsController@ttnViewpoints')->name('exhibition.ttn.viewpoints');
Route::get('plan-your-visit/exhibitions/true-to-nature-open-air-painting-in-europe-1780-1870/viewpoints/{id}', 'exhibitionsController@ttnViewpoint')->name('exhibition.ttn.viewpoint');


/*
News routes
*/
Route::get('news/', 'newsController@index')->name('news');
Route::get('news/{slug}/', 'newsController@article')->name('article');

/*
learning routes
*/
Route::get('learn-with-us/look-think-do/', 'learningController@lookThinkDoMain')->name('ltd');
Route::get('learn-with-us/look-think-do/{slug}', 'learningController@lookThinkDoActivity')->name('ltd-activity');
Route::get('learn-with-us/resources/', 'learningController@resources')->name('learn-with-us-resources');
Route::get('learn-with-us/resources/{slug}', 'learningController@resource')->name('learn-with-us-resource');
Route::get('learn-with-us/school-sessions/{slug}', 'learningController@session')->name('school-sessions');
Route::get('learn-with-us/community-programming/{slug}', 'learningController@community')->name('community-programming');

Route::get('learn-with-us/young-people/{slug}', 'learningController@young')->name('young-people');
Route::get('learn-with-us/contact-us/', 'learningController@profiles')->name('learn-with-us-profiles');
Route::get('learn-with-us/adult-programming/{slug}', 'learningController@adult')->name('adult-activity');
Route::get('learn-with-us/gallery-activities/{slug}', 'learningController@galleryActivity')->name('gallery-activity');

/*
* Object and highlight routes
*/
Route::match(array('GET','POST'),'explore-our-collection/highlights/search/results', 'highlightsController@results')->name('highlight-search');

Route::get('explore-our-collection/', 'highlightsController@landing')->name('objects');
Route::get('explore-our-collection/highlights', 'highlightsController@index')->name('highlights');
Route::get('explore-our-collection/highlights/periods/', 'highlightsController@period')->name('periods');
Route::get('explore-our-collection/highlights/themes/', 'highlightsController@theme')->name('themes');
Route::get('explore-our-collection/highlights/context/', 'highlightsController@contextual')->name('context');
Route::get('explore-our-collection/highlights/periods/{period}', 'highlightsController@byPeriod')->name('period');

Route::get('explore-our-collection/highlights/themes/{theme}', 'highlightsController@byTheme')->name('theme');
Route::get('explore-our-collection/highlights/context/{section}/', 'highlightsController@pharosSections')->name('context-sections');
Route::get('explore-our-collection/highlights/context/{section}/{slug}/', 'highlightsController@associate')->name('context-section-detail');
Route::get('explore-our-collection/highlights/{slug}/', 'highlightsController@details')->name('highlight');

Route::get('explore-our-collection/audio-guide/', 'highlightsController@audioguide')->name('audio-guide');
Route::get('explore-our-collection/audio-guide/{slug}/', 'highlightsController@stop')->name('audio-stop');
/*
* Social
*/
Route::get('/conversations/', 'socialController@index')->name('conversations');

/*
*
*/
Route::get('/conversations/instagram/', 'socialController@instagram')->name('instagram');
Route::get('/conversations/instagram/{slug}/', 'socialController@story')->name('instagram.story');
Route::get('/conversations/twitter/', 'socialController@twitter')->name('twitter');

/*
* podcasts
*/
Route::get('/conversations/podcasts/in-my-minds-eye', 'podcastsController@mindseyes')->name('mindeyes');
Route::get('/conversations/podcasts/in-my-minds-eye/{slug}/', 'podcastsController@mindseye')->name('mindeyes.story');
Route::get('/conversations/podcasts/presenters/', 'podcastsController@presenters')->name('podcast.presenters');
Route::get('/conversations/podcasts/presenters/{slug}', 'podcastsController@presenter')->name('podcast.presenter');

Route::get('/conversations/podcasts/', 'podcastsController@index')->name('podcasts');
Route::get('/conversations/podcasts/{slug}', 'podcastsController@series')->name('podcasts.series');
Route::get('/conversations/podcasts/episode/{slug}', 'podcastsController@episode')->name('podcasts.episode');


Route::get('/events', 'tessituraController@index')->name('events');

Route::match(array('GET', 'POST'), 'events/search', [
    'uses' => 'tessituraController@search',
    'as' => 'tessitura.search'
]);

Route::group(['domain' => 'https://tickets.museums.cam.ac.uk'], function() {
    Route::get('/events', 'tessituraController@type')->name('events.type');
});

/*
* Search routing
*/
Route::get('search', 'searchController@index')->name('search.index');
Route::match(array('GET', 'POST'), 'search/results', [
    'uses' => 'searchController@results',
    'as' => 'search.results'
]);
/*
 * Route for checking solr up and running
 */
Route::get('/ping', 'searchController@ping')->name('ping');

/*
* Cache clear route
*/
Route::get('/clear-cache', [
    'as' => 'cache-clear',
    'uses' => 'Controller@clearCache'
])->middleware('auth.very_basic', 'doNotCacheResponse');


/*
* Catch all route
*/
Route::get('/{section}', 'pagesController@landing')->name('landing');
Route::get('/{section}/{slug}/', 'pagesController@index')->name('landing-section');
