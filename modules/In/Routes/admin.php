<?php

use Illuminate\Support\Facades\Route;

Route::middleware('admin')->group(function () {
    Route::prefix('in')->group(function () {
        Route::group(['middleware' => 'can:in'], function () {
            Route::get('/', "InController@index")->name('get.in.list');
            Route::get('/mau1', "InController@printMau1")->name('get.in.printMau1');
            Route::get('/mau2', "InController@printMau2")->name('get.in.printMau2');
            Route::get('/mau3', "InController@printMau3")->name('get.in.printMau3');
            Route::get('/mau4', "InController@printMau4")->name('get.in.printMau4');
            Route::get('/mau5', "InController@printMau5")->name('get.in.printMau5');
            Route::get('/mau6', "InController@printMau6")->name('get.in.printMau6');
            Route::get('/mau7', "InController@printMau7")->name('get.in.printMau7');
            Route::get('/mau8', "InController@printMau8")->name('get.in.printMau8');
            Route::get('/mau9', "InController@printMau9")->name('get.in.printMau9');
            Route::get('/mau10', "InController@printMau10")->name('get.in.printMau10');
            Route::get('/mau11', "InController@printMau11")->name('get.in.printMau11');
        });
    });
});
