<?php

use Illuminate\Support\Facades\Route;

Route::middleware('admin')->group(function () {
    Route::prefix("dgcb")->group(function () {
        Route::get("/", "DgcbController@index")->name("get.dgcb.list")->middleware('can:dgcb');
        Route::group(['middleware' => 'can:dgcb-create'], function () {
            Route::get('/create', 'DgcbController@getCreate')->name('get.dgcb.create');
            Route::post('/create', 'DgcbController@postCreate')->name('post.dgcb.create');
        });
        Route::group(['middleware' => 'can:dgcb-update'], function () {
            Route::get('/update/{madv}/{nam}', 'DgcbController@getUpdate')->name('get.dgcb.update');
            Route::post('/update/{madv}/{nam}', 'DgcbController@postUpdate')->name('post.dgcb.update');
        });
        Route::get('/delete/{madv}/{nam}', 'DgcbController@delete')->name('get.dgcb.delete')->middleware('can:dgcb-delete');
    });
});
