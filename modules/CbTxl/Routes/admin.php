<?php

use Illuminate\Support\Facades\Route;

Route::middleware('admin')->group(function () {
    Route::prefix("cbtxl")->group(function () {
        Route::get("/", "CbTxlController@index")->name("get.cbtxl.list")->middleware('can:cbtxl');
        Route::group(['middleware' => 'can:cbtxl-create'], function () {
            Route::get('/create', 'CbTxlController@getCreate')->name('get.cbtxl.create');
            Route::post('/create', 'CbTxlController@postCreate')->name('post.cbtxl.create');
        });
        Route::group(['middleware' => 'can:cbtxl-update'], function () {
            Route::get('/update/{macb}/{nam}', 'CbTxlController@getUpdate')->name('get.cbtxl.update');
            Route::post('/update/{macb}/{nam}', 'CbTxlController@postUpdate')->name('post.cbtxl.update');
        });
        Route::get('/delete/{macb}/{nam}', 'CbTxlController@delete')->name('get.cbtxl.delete')->middleware('can:cbtxl-delete');
    });
});
