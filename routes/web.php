<?php

use Illuminate\Support\Facades\Route;

Route::get('/', 'Main@index')->name('index');

Route::get('/to_add', 'Main@add_member_page')->name('add');

Route::post('/submit', 'Main@submit_member')->name('submit');

Route::get('/delete/{id}', 'Main@delete_member')->name('delete');

Route::get('/up_page/{id}', 'Main@update_page')->name('update_page');

Route::post('update', 'Main@update_member')->name('update');

Route::get('/plus/{id}', 'Main@plus')->name('plus');

Route::get('/search', 'Main@search')->name('search');