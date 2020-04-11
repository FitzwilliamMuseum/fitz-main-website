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

Route::get('/', function () {
    return view('index');
});

Route::resource('aboutus', 'aboutUsController');
Route::resource('research', 'researchController');
Route::resource('collections', 'collectionsController');
Route::resource('visit-us', 'visitController');
Route::resource('news', 'newsController');
Route::resource('departments', 'departmentsController');

Route::get('/news/article/{slug}/', 'newsController@article');

Route::get('/collections/by-focus/{slug}/', 'collectionsController@details');
Route::get('/departments/titled/{slug}/', 'departmentsController@details');
Route::get('/{section}/{slug}/', 'pagesController@index');
Route::get('/{section}/', 'pagesController@landing');
