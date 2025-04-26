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

use App\Http\Controllers\SiteMapController;
use App\Http\Controllers\VisualFeedbackController;

Route::get('/', function () {
  return redirect(route('sitemap.index'));
});
Route::resource('sitemap', SiteMapController::class);
Route::get('sitemap/check/{key}', [SiteMapController::class, 'check'])->name('sitemap.check');
Route::get('sitemap/output', [SiteMapController::class,'output'])->name('sitemap.output');
Route::post('sitemap/add', [SiteMapController::class, 'add'])->name('sitemap.add');

Route::resource('visualfeedback', VisualFeedbackController::class);