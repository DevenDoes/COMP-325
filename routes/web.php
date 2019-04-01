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

Route::post('/', 'EarlyAccessController@store');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('logout', function() {
    Auth::logout();
    return redirect('/login');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::get('/papers', function() {
    return view('papers.papers');
});

Route::get('/papers/{paper}', function(App\Paper $paper) {
    return view('papers.paper', [
        'paper' => $paper,
    ]);
});
