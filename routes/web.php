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

Route::get('/kelurahan','KelurahanController@index');
Route::get('/kelurahan/view', 'KelurahanController@view');
Route::get('/kelurahan/view-data', 'KelurahanController@getKelurahan');
Route::get('/kelurahan/add', 'KelurahanController@insert');
Route::get('/kelurahan/edit/{id}', 'KelurahanController@edit');
Route::post('/kelurahan/save', 'KelurahanController@save');
Route::post('/kelurahan/update/{id}', 'KelurahanController@update');

Route::get('/rukunwarga','RukunWargaController@index');
Route::get('/rukunwarga/add','RukunWargaController@insert');
Route::get('/rukunwarga/edit/{id}','RukunWargaController@edit');

Auth::routes();

Route::get('/home', 'HomeController@index');
