<?php

use Illuminate\Support\Facades\Route;



Route::get('/', 'BoysController@inicio')->name('home');

Route::get('boys/add', 'BoysController@viewBoy')->name('saveBoy');
Route::post('boys/save', 'BoysController@boyData')->name('boyData');

