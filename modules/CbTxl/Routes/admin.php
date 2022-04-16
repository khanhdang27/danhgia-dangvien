<?php

use Illuminate\Support\Facades\Route;

Route::middleware('admin')->group(function () {
    Route::prefix("cbtxl")->group(function () {
        Route::group(['middleware' => 'can:cbtxl'], function () {
            Route::get("/", "CbTxlController@index")->name("get.cbtxl.list");
            Route::get('/create', 'CbTxlController@getCreate')->name('get.cbtxl.create');
            Route::post('/create', 'CbTxlController@postCreate')->name('post.cbtxl.create');
            Route::get('/update/{macb}/{nam}', 'CbTxlController@getUpdate')->name('get.cbtxl.update');
            Route::post('/update/{macb}/{nam}', 'CbTxlController@postUpdate')->name('post.cbtxl.update');
            Route::get('/delete/{macb}/{nam}', 'CbTxlController@delete')->name('get.cbtxl.delete');
        });
    });
});
