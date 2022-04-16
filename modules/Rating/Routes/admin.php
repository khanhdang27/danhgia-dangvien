<?php

use Illuminate\Support\Facades\Route;

Route::middleware('admin')->group(function () {
    Route::prefix('xeploai')->group(function () {
        Route::group(['middleware' => 'can:rating'], function () {
            Route::get('/', "RatingController@index")->name('get.rating.list');
            Route::get('create', "RatingController@getCreate")->name('get.rating.create');
            Route::post('create', "RatingController@postCreate")->name('post.rating.create');
            Route::get('update/{id}', "RatingController@getUpdate")->name('get.rating.update');
            Route::post('update/{id}', "RatingController@postUpdate")->name('post.rating.update');
            Route::get('delete/{id}', "RatingController@delete")->name('get.rating.delete');
        });
    });
});
