<?php

use App\Http\Controllers\AssessmentController;
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
// Route::get('/', function () {
//     return view('auth.login');
// })->middleware('auth');




// Route::get('/fd', function () {
//     return view('faculty_dashboard');
// });

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Auth::routes();

// Route::get('/', 'App\Http\Controllers\HomeController@index')->name('home');


Route::group(['middleware' => 'auth'], function () {
	Route::resource('user', 'App\Http\Controllers\UserController', ['except' => ['show']]);
	Route::get('profile', ['as' => 'profile.edit', 'uses' => 'App\Http\Controllers\ProfileController@edit']);
	Route::put('profile', ['as' => 'profile.update', 'uses' => 'App\Http\Controllers\ProfileController@update']);
	Route::get('upgrade', function () {return view('pages.upgrade');})->name('upgrade');
	 Route::get('map', function () {return view('pages.maps');})->name('map');
	 Route::get('icons', function () {return view('pages.icons');})->name('icons');
     Route::post('/assessmentinsert', [App\Http\Controllers\AssessmentController::class, 'insert'])->name('ai');
     Route::post('/enrollmentinsert', [App\Http\Controllers\enrollmentController::class, 'insert'])->name('ei');
     Route::post('/enrollmentview', [App\Http\Controllers\EnrollmentViewController::class, 'view'])->name('ev');
     Route::post('/assessmentview', [App\Http\Controllers\assessmentViewController::class, 'view'])->name('av');
     Route::get('/obe', [App\Http\Controllers\obeController::class, 'view'])->name('obe');
     Route::post('/gpa', [App\Http\Controllers\cgpaCalculateController::class, 'view'])->name('gpa');
     Route::post('/coview', [App\Http\Controllers\coViewController::class, 'view'])->name('coview');
     Route::post('/gpaview', [App\Http\Controllers\assessmentComparisonController::class, 'view'])->name('gpaview');
     Route::post('/enrollmentcomparison', [App\Http\Controllers\enrollmentComparisonController::class, 'view'])->name('ecv');
	 Route::get('assessment/insert', function () {return view('assessment.insert');})->name('assessment-insert');
     Route::get('co/view', function () {return view('CO_PLO.view');})->name('co-view');
     Route::get('assessment/view', function () {return view('assessment.view');})->name('assessment-view');
     Route::get('assessment/calculate', function () {return view('assessment.calculate');})->name('assessment-calculate');
     Route::get('assessment/compare', function () {return view('assessment.compare');})->name('assessment-compare');
     Route::get('assessment', function () {return view('backup_welcome');})->name('table');
     Route::get('enrollment/insert', function () {return view('enrollment.insert');})->name('enrollment-insert');
     Route::get('enrollment/view', function () {return view('enrollment.view');})->name('enrollment-view');
     Route::get('enrollment/compare', function () {return view('enrollment.compare');})->name('enrollment-compare');
	Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'App\Http\Controllers\ProfileController@password']);
});


// Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
