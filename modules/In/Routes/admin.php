<?php

use Illuminate\Support\Facades\Route;

Route::middleware('admin')->group(function () {
    Route::prefix('in')->group(function () {
        Route::group(['middleware' => 'can:in'], function () {
            Route::get('/', "InController@index")->name('get.in.list');
            Route::get('/mau1', "InController@printMau1")->name('get.in.printMau1');
            Route::get('/mau2', "InController@printMau2")->name('get.in.printMau2');
            Route::get('/mau3', "InController@printMau3")->name('get.in.printMau3');
        });
    });
});
