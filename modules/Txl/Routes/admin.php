<?php

use Illuminate\Support\Facades\Route;

Route::middleware('admin')->group(function () {
    Route::prefix("txl")->group(function () {
        Route::group(['middleware' => 'can:txl'], function () {
            Route::get("/", "TxlController@index")->name("get.txl.list");
            Route::get('/create', 'TxlController@getCreate')->name('get.txl.create');
            Route::post('/create', 'TxlController@postCreate')->name('post.txl.create');
            Route::get('/update/{madv}/{nam}', 'TxlController@getUpdate')->name('get.txl.update');
            Route::post('/update/{madv}/{nam}', 'TxlController@postUpdate')->name('post.txl.update');
            Route::get('/delete/{madv}/{nam}', 'TxlController@delete')->name('get.txl.delete');
        });
    });
});
