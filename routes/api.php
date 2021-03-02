<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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



Route::get('search','BeerController@search');
Route::get('brewer_list','BrewerController@index');
Route::get('show_beer/{id}','BeerController@show');
Route::get('store_brewer','BrewerController@store');
