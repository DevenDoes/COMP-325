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

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/source', 'SourceController@index');
Route::get('/source/create', 'SourceController@create');
Route::post('/source/store', 'SourceController@store');
Route::get('/source/{source}/edit', 'SourceController@edit');
Route::post('/source/{source}/update', 'SourceController@update');
Route::get('/source/{source}/destroy', 'SourceController@destroy');

Route::get('/source/{source}/insight/create', 'InsightController@create');
Route::post('/source/{source}/insight/store', 'InsightController@store');

Route::get('/source/{source}/insight/{insight}/evidence/create', 'EvidenceController@create');
Route::post('/source/{source}/insight/{insight}/evidence/store', 'EvidenceController@store');
