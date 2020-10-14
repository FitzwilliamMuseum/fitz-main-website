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

/*
About us routes
*/
Route::get('about-us/directors', 'aboutusController@directors')->name('directors');
Route::get('about-us/directors/{slug}', 'aboutusController@director')->name('director');
Route::get('about-us/press-room', 'aboutusController@press')->name('press-room');
Route::get('about-us/governance', 'aboutusController@governance')->name('governance');
Route::get('about-us/collections', 'collectionsController@index')->name('collections');
Route::get('about-us/collections/{slug}/', 'collectionsController@details')->name('collection');
Route::get('about-us/departments/', 'departmentsController@index')->name('departments');
Route::get('about-us/departments/{slug}', 'departmentsController@details')->name('department');
Route::get('about-us/departments/conservation-and-collections-care/{slug}', 'departmentsController@conservation')->name('conservation-care');

/*
Research section routes
*/
Route::get('research/', 'researchController@index')->name('research');
Route::get('research/projects/', 'researchController@projects')->name('research-projects');
Route::get('research/projects/{slug}/', 'researchController@project')->name('research-project');
Route::get('research/staff-profiles', 'researchController@profiles')->name('research-profiles');
Route::get('research/staff-profiles/{slug}', 'researchController@profile')->name('research-profile');
Route::get('research/online-resources/', 'researchController@resources')->name('resources');
Route::get('research/online-resources/{slug}', 'researchController@resource')->name('resource');

/*
Visit us Route
*/
Route::get('visit-us/', 'visitController@index')->name('visit');
Route::get('visit-us/galleries', 'galleriesController@index')->name('galleries');
Route::get('visit-us/galleries/{slug}', 'galleriesController@gallery')->name('gallery');
Route::get('visit-us/exhibitions/', 'exhibitionsController@index')->name('exhibitions');
Route::get('visit-us/exhibitions/archive', 'exhibitionsController@archive')->name('archive');
Route::get('visit-us/exhibitions/future', 'exhibitionsController@future')->name('future');
Route::get('visit-us/exhibitions/{slug}', 'exhibitionsController@details')->name('exhibition');

/*
News routes
*/
Route::get('news/', 'newsController@index')->name('news');
Route::get('news/feed/', 'newsController@atom')->name('feed');
Route::get('news/{slug}/', 'newsController@article')->name('article');

/*
Learning routes
*/
Route::get('learning/look-think-do/', 'learningController@lookthinkdomain')->name('ltd');
Route::get('learning/look-think-do/{slug}', 'learningController@lookthinkdoactivity')->name('ltd-activity');
Route::get('learning/resources/', 'learningController@resources')->name('learning-resources');
Route::get('learning/resources/{slug}', 'learningController@resource')->name('learning-resource');
Route::get('learning/school-sessions/{slug}', 'learningController@session')->name('school-sessions');
Route::get('learning/young-people/{slug}', 'learningController@young')->name('young-people');
Route::get('learning/contact-us/', 'learningController@profiles')->name('learning-profiles');
Route::get('learning/adult-programming/{slug}', 'learningController@adult')->name('adult-activity');

/*
Themes routes - are these obsolete?
*/
Route::get('themes/', 'themesController@index')->name('themes');
Route::get('themes/{slug}', 'themesController@theme')->name('theme');

/*
* Object and highlight routes
*/
Route::get('objects-and-artworks/', 'highlightsController@landing')->name('objects');
Route::get('objects-and-artworks/highlights', 'highlightsController@index')->name('highlights');
Route::get('objects-and-artworks/highlights/{slug}/', 'highlightsController@details')->name('highlight');
Route::get('objects-and-artworks/highlights/periods/', 'highlightsController@period')->name('periods');
Route::get('objects-and-artworks/highlights/periods/{period}', 'highlightsController@byperiod')->name('period');
Route::get('objects-and-artworks/highlights/themes/', 'highlightsController@theme')->name('themes');
Route::get('objects-and-artworks/highlights/themes/{theme}', 'highlightsController@bytheme')->name('theme');
Route::get('objects-and-artworks/highlights/context/', 'highlightsController@contextual')->name('context');
Route::get('objects-and-artworks/highlights/context/{section}/', 'highlightsController@pharosSections')->name('context-sections');
Route::get('objects-and-artworks/highlights/context/{section}/{slug}/', 'highlightsController@associate')->name('context-section-detail');
Route::match(array('GET','POST'),'objects-and-artworks/highlights/search/results/', 'highlightsController@results')->name('highlight-search');
Route::get('objects-and-artworks/audio-guide/', 'highlightsController@audioguide')->name('audio-guide');
Route::get('objects-and-artworks/audio-guide/{slug}/', 'highlightsController@stop')->name('audio-stop');

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
Route::get('/conversations/podcasts/', 'podcastsController@index')->name('podcasts');
Route::get('/conversations/podcasts/{slug}', 'podcastsController@series')->name('podcasts.series');
Route::get('/conversations/podcasts/episode/{slug}', 'podcastsController@episode')->name('podcasts.episode');
Route::get('/conversations/podcasts/in-my-minds-eye', 'podcastsController@mindseyes')->name('mindeyes');
Route::get('/conversations/podcasts/in-my-minds-eye/{slug}/', 'podcastsController@mindseye')->name('mindeyes.story');


/*
* Search routing
*/
Route::get('search', 'searchController@index');
Route::match(array('GET', 'POST'), 'search/results', [
    'uses' => 'searchController@results',
    'as' => 'search.results'
]);
Route::get('search/shopify', 'searchController@shopify');
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
// Route::get('/clear-cache', ['middleware' => 'auth.very_basic'], 'Controller@clearCache')->name('cache');

/*
* Catch all route
*/
Route::get('/{section}/{slug}/', 'pagesController@index')->name('landing-section');
Route::get('/{section}', 'pagesController@landing')->name('landing');
