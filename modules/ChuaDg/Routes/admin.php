<?php

use Illuminate\Support\Facades\Route;

Route::middleware('admin')->group(function () {
    Route::prefix("chuadg")->group(function () {
        Route::get("/", "ChuaDgController@index")->name("get.chuadg.list")->middleware('can:chuadg');
        Route::group(['middleware' => 'can:chuadg-create'], function () {
            Route::get('/create', 'ChuaDgController@getCreate')->name('get.chuadg.create');
            Route::post('/create', 'ChuaDgController@postCreate')->name('post.chuadg.create');
        });
        Route::group(['middleware' => 'can:chuadg-update'], function () {
            Route::get('/update/{madv}/{nam}', 'ChuaDgController@getUpdate')->name('get.chuadg.update');
            Route::post('/update/{madv}/{nam}', 'ChuaDgController@postUpdate')->name('post.chuadg.update');
        });
        Route::get('/delete/{madv}/{nam}', 'ChuaDgController@delete')->name('get.chuadg.delete')->middleware('can:chuadg-delete');
    });
});
