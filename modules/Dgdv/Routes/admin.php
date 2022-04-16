<?php

use Illuminate\Support\Facades\Route;

Route::middleware('admin')->group(function () {
    Route::prefix("dgdv")->group(function () {
        Route::group(['middleware' => 'can:dgdv'], function () {
            Route::get("/", "DgdvController@index")->name("get.dgdv.list")->middleware('can:dgdv');
            Route::post("/", "DgdvController@updateDgdv")->name("post.dgdv.list")->middleware('can:dgdv');
            //        Route::group(['middleware' => 'can:dgdv-create'], function () {
            //            Route::get('/create', 'DgdvController@getCreate')->name('get.dgdv.create');
            //            Route::post('/create', 'DgdvController@postCreate')->name('post.dgdv.create');
            //        });
            //        Route::group(['middleware' => 'can:dgdv-update'], function () {
            //            Route::get('/update/{madv}/{nam}', 'DgdvController@getUpdate')->name('get.dgdv.update');
            //            Route::post('/update/{madv}/{nam}', 'DgdvController@postUpdate')->name('post.dgdv.update');
            //        });
            //        Route::get('/delete/{madv}/{nam}', 'DgdvController@delete')->name('get.dgdv.delete')->middleware('can:dgdv-delete');
        });
    });
});
