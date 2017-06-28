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


Route::resource('/', 'LapKeuanganController');
Route::get('file', 'LapKeuanganController@data');
Route::get('export-file/{type}', 'LapKeuanganController@exportFile');
Route::post('import-file', 'LapKeuanganController@importFile');
