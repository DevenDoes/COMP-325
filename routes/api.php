<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('/papers', 'PaperController@index');
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

Route::get('/papers/{paper}/analyses/{analysis}', 'AnalysisController@show');
Route::post('/papers/{paper}/analyses', 'AnalysisController@store');
Route::patch('/papers/{paper}/analyses/{analysis}', 'AnalysisController@update');
Route::delete('/papers/{paper}/analyses/{analysis}', 'AnalysisController@destroy');

Route::get('/papers/{paper}/arguments/{argument}', 'ArgumentController@show');
Route::post('/papers/{paper}/arguments', 'ArgumentController@store');
Route::patch('/papers/{paper}/arguments/{argument}', 'ArgumentController@update');
Route::delete('/papers/{paper}/arguments/{argument}', 'ArgumentController@destroy');

Route::get('/papers/{paper}/outlines/{outline}', 'OutlineController@show');
Route::post('/papers/{paper}/outlines', 'OutlineController@store');
Route::patch('/papers/{paper}/outlines/{outline}', 'OutlineController@update');
Route::delete('/papers/{paper}/outlines/{outline}', 'OutlineController@destroy');

Route::get('/papers/{paper}/outlines/{outline}/paragraphs/{paragraph}', 'ParagraphController@show');
Route::post('/papers/{paper}/outlines/{outline}/paragraphs', 'ParagraphController@store');
Route::patch('/papers/{paper}/outlines/{outline}/paragraphs/{paragraph}', 'ParagraphController@update');
Route::delete('/papers/{paper}/outlines/{outline}/paragraphs/{paragraph}', 'ParagraphController@destroy');
