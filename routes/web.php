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
    return view('createLead');
});
Route::post('saveLead', 'LeadsController@store')->name('save');
Route::get('/admin', 'LeadsController@index')->name('admin')->middleware('auth');
Route::resource('leads', 'LeadsController')->middleware('auth');
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
