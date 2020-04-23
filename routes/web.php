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
})->name("guest");


Route::post('/search', 'SearchController@index')->name('search');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::post('/record/save', 'HomeController@save')->name('saverecord');
Route::post('/record/delete', 'HomeController@delete')->name('deleterecord');
Route::post('/record/update', 'HomeController@update')->name('updaterecord');


Route::get('/record/edit/{id}', 'HomeController@edit')->name('editrecord');

