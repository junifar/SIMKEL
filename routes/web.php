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
Route::get('/kelurahan/view/data', 'KelurahanController@getKelurahan');
Route::get('/kelurahan/add', 'KelurahanController@insert');
Route::get('/kelurahan/edit/{id}', 'KelurahanController@edit');
Route::post('/kelurahan/save', 'KelurahanController@save');
Route::post('/kelurahan/update/{id}', 'KelurahanController@update');

Route::get('/rukunwarga','RukunWargaController@index');
Route::get('/rukunwarga/data','RukunWargaController@indexdata');
Route::get('/rukunwarga/add','RukunWargaController@create');
Route::post('/rukunwarga/save','RukunWargaController@store');
Route::get('/rukunwarga/edit/{id}','RukunWargaController@edit');
Route::post('/rukunwarga/update/{id}','RukunWargaController@update');

Route::get('/rukuntetangga','RukunTetanggaController@index');
Route::get('/rukuntetangga/data','RukunTetanggaController@indexdata');
Route::get('/rukuntetangga/add','RukunTetanggaController@create');
Route::post('/rukuntetangga/save','RukunTetanggaController@store');
Route::get('/rukuntetangga/edit/{id}','RukunTetanggaController@edit');
Route::post('/rukuntetangga/update/{id}','RukunTetanggaController@update');

Route::get('/administration/kelurahan', 'AdministrationController@kelurahan');
Route::get('/administration/kelurahan/data', 'AdministrationController@kelurahandata');
Route::get('/administration/kelurahan/data-rukunwarga/{id}', 'AdministrationController@rukunwargadata');

Route::get('/administration/kelurahan/view/{id}', 'AdministrationController@kelurahanview');

Auth::routes();

Route::get('/home', 'HomeController@index');
