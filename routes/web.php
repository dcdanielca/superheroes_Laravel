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

Route::get('/', 'SuperHeroController@index');
Route::get('/superhero/ranking', 'SuperHeroRankingController@index');
Route::get('/superhero/{id}', 'SuperHeroDetailController@index');
Route::get('/index/superhero/{id}/{like}', 'SuperHeroController@update');
Route::get('/superhero/{id}/{like}', 'SuperHeroDetailController@update');

