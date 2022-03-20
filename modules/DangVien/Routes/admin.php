<?php

use Illuminate\Support\Facades\Route;

Route::middleware('admin')->group(function () {
    Route::prefix("dangvien")->group(function () {
        Route::get("/", "DangVienController@index")->name("get.dangvien.list")->middleware('can:dangvien');
        Route::group(['middleware' => 'can:dangvien-create'], function () {
            Route::get('/create', 'DangVienController@getCreate')->name('get.dangvien.create');
            Route::post('/create', 'DangVienController@postCreate')->name('post.dangvien.create');
        });
        Route::group(['middleware' => 'can:dangvien-update'], function () {
            Route::get('/update/{id}', 'DangVienController@getUpdate')->name('get.dangvien.update');
            Route::post('/update/{id}', 'DangVienController@postUpdate')->name('post.dangvien.update');
        });
        Route::get('/delete/{id}', 'DangVienController@delete')->name('get.dangvien.delete')->middleware('can:dangvien-delete');
    });
});
