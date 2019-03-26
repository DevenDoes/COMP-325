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

Route::get('/papers/{paper}', 'PaperController@show');
Route::post('/papers', 'PaperController@store');
Route::patch('/papers/{paper}', 'PaperController@update');
Route::delete('/papers/{paper}', 'PaperController@destroy');

Route::get('/papers/{paper}/sources/{source}', 'SourceController@show');
Route::post('/papers/{paper}/sources', 'SourceController@store');
Route::patch('/papers/{paper}/sources/{source}', 'SourceController@update');
Route::delete('/papers/{paper}/sources/{source}', 'SourceController@destroy');

Route::get('/papers/{paper}/sources/{source}/evidence/{evidence}', 'EvidenceController@show');
Route::post('/papers/{paper}/sources/{source}/evidence', 'EvidenceController@store');
Route::patch('/papers/{paper}/sources/{source}/evidence/{evidence}', 'EvidenceController@update');
Route::delete('/papers/{paper}/sources/{source}/evidence/{evidence}', 'EvidenceController@destroy');
