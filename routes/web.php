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

Route::resource('company', 'CompanyController')->middleware('lang');
Route::resource('employee', 'EmployeeController')->middleware('lang');
Route::get('setlang/{lang}', function ($lang) {
         setLang($lang);
        return back();
})->name('setlang');
//Route::get('/home', 'HomeController@index')->name('home');
