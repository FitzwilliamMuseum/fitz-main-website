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

Route::get('/', 'homeController@index');
Route::get('about-us/directors', 'aboutusController@directors');
Route::get('about-us/press-room', 'aboutusController@press');
Route::get('about-us/governance', 'aboutusController@governance');
Route::get('research/', 'researchController@index');
Route::get('research/projects/', 'researchController@projects');
Route::get('research/projects/{slug}/', 'researchController@project');
Route::get('research/staff-profiles', 'researchController@profiles');
Route::get('research/staff-profiles/{slug}', 'researchController@profile');
Route::get('collections', 'collectionsController@index');
Route::get('visit-us/', 'visitController@index');
Route::get('news/', 'newsController@index');
Route::get('departments/', 'departmentsController@index');
Route::get('departments/{slug}', 'departmentsController@details');
Route::get('news/article/{slug}/', 'newsController@article');
Route::get('collections/by-focus/{slug}/', 'collectionsController@details');
Route::get('departments/titled/{slug}/', 'departmentsController@details');
Route::get('learning/look-think-do/', 'learningController@lookthinkdomain');
Route::get('learning/look-think-do/{slug}', 'learningController@lookthinkdoactivity');
Route::get('learning/resources/', 'learningController@resources');
Route::get('learning/resources/{slug}', 'learningController@resource');
Route::get('themes/', 'themesController@index');
Route::get('themes/{slug}', 'themesController@theme');
Route::get('galleries', 'galleriesController@index');
Route::get('galleries/{slug}', 'galleriesController@gallery');
Route::get('exhibitions/', 'exhibitionsController@index');
Route::get('exhibitions/archive', 'exhibitionsController@archive');
Route::get('exhibitions/future', 'exhibitionsController@future');
Route::get('exhibitions/{slug}', 'exhibitionsController@details');
Route::feeds();
/*
Put these last
*/
Route::get('/{section}/{slug}/', 'pagesController@index');
Route::get('/{section}/', 'pagesController@landing');
