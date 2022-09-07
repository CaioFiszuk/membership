<?php

use App\Http\Controllers\MemberController;
use Illuminate\Support\Facades\Route;

Route::controller(MemberController::class)->group(function(){
    Route::get('/', 'index')->name('index');
    Route::post('/create', 'createMember')->name('create.member');
    Route::get('/update_page/{id}', 'updatePage')->name('update.page');
    Route::post('/update', 'updateMember')->name('update.member');
    Route::get('/delete/{id}', 'deleteMember')->name('delete.member');
    Route::get('/plus/{id}', 'plus')->name('plus');
    Route::get('/search', 'search')->name('search');
});
