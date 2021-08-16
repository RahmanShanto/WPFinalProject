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
    return view('welcome');
});

Auth::routes();

Route::group(['middleware' => 'auth'], function () {
    Route::get('/home', 'HomeController@index')->name('home');
    Route::resource('/student', 'StudentController');

    Route::get('/science-student-list', 'DepartmentController@science')->name('science');
    Route::get('/commerce-student-list', 'DepartmentController@commerce')->name('commerce');
    Route::get('/arts-student-list', 'DepartmentController@arts')->name('arts');
});
