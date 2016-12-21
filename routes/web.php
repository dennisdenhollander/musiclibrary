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
    return redirect('band');
});

Route::get('bands/populate', 'BandController@populate')->name('popbands');

Route::get('albums/populate/{band?}', 'AlbumController@populate')->name('popalbums');

Route::get('album/{id}/destroy', 'AlbumController@destroy');
Route::get('band/{id}/destroy', 'BandController@destroy');

Route::resource('album', 'AlbumController');

Route::resource('band','BandController');
