<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


Auth::routes();

Route::get('/', 'IndexController@index')->name('home');

Route::get('/factions', 'FactionController@showFactions')->name('faction');

Route::get('/gumballs', 'GumballController@showGumballsForm')->name('gumball');
Route::post('/gumballs', 'GumballController@gumball');

Route::get('/fates', 'FateController@index')->name('fate');
Route::post('/fates', 'FateController@fates');


