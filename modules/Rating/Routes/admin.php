<?php

use Illuminate\Support\Facades\Route;

Route::middleware('admin')->group(function () {
    Route::prefix('xeploai')->group(function (){
        Route::get('/', "RatingController@index")->name('get.rating.list')->middleware('can:rating');
        Route::middleware('can:rating-create')->group(function (){
            Route::get('create', "RatingController@getCreate")->name('get.rating.create');
            Route::post('create', "RatingController@postCreate")->name('post.rating.create');
        });
        Route::middleware('can:rating-update')->group(function () {
            Route::get('update/{id}', "RatingController@getUpdate")->name('get.rating.update');
            Route::post('update/{id}', "RatingController@postUpdate")->name('post.rating.update');
        });
        Route::get('delete/{id}', "RatingController@delete")->name('get.rating.delete')->middleware('can:rating-delete');
    });
});
