<?php

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
  return redirect(route('sitemap.index'));
});
Route::resource('project', 'ProjectController');
Route::resource('sitemap', 'SiteMapController');
Route::get('/sitemap/check/{key}', 'SiteMapController@check')->name('sitemap.check');
Route::get('/sitemap/output', 'SiteMapController@output')->name('sitemap.output');
Route::post('/sitemap/add', 'SiteMapController@add')->name('sitemap.add');
