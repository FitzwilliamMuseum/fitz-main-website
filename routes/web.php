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
Route::get('aboutus', 'aboutUsController@index');
Route::get('research/', 'researchController@index');
Route::get('research/projects/', 'researchController@projects');
Route::get('research/project/{slug}/', 'researchController@project');
Route::get('research/staff-profiles', 'researchController@profiles');
Route::get('research/staff-profiles/{slug}', 'researchController@profile');
Route::get('collections', 'collectionsController@index');
Route::get('visit-us', 'visitController@index');
Route::get('news', 'newsController@index');
Route::get('departments', 'departmentsController@index');
Route::get('/news/article/{slug}/', 'newsController@article');
Route::get('/collections/by-focus/{slug}/', 'collectionsController@details');
Route::get('/departments/titled/{slug}/', 'departmentsController@details');
Route::get('/learning/look-think-do/', 'learningController@lookthinkdomain');
Route::get('/learning/look-think-do/{slug}', 'learningController@lookthinkdoactivity');



/*
Put these last
*/
Route::get('/{section}/{slug}/', 'pagesController@index');
Route::get('/{section}/', 'pagesController@landing');
