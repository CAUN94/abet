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
    return redirect('home');
});


Route::get('/report/{report}', 'StartReportController@edit');
Route::patch('/report/{report}', 'StartReportController@update');

Route::get('/reportprogress/{report}', 'CompleteReportController@edit');
Route::patch('/reportprogress/{report}', 'CompleteReportController@update');

Route::get('/finishprogress/{report}', 'ReportController@show');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/categories/{category}', 'CategoryController@show')->name('category');

Route::get('/profile', 'ProfileController@index')->name('profile');
Route::put('/profile', 'ProfileController@update')->name('profile.update');

Route::get('/about', function () {
    return view('about');
})->name('about');
