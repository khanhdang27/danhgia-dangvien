<?php

use Illuminate\Support\Facades\Route;

Route::middleware('admin')->group(function () {
    Route::prefix("chibo")->group(function () {
        Route::group(['middleware' => 'can:chibo'], function () {
            Route::get("/", "ChiBoController@index")->name("get.chibo.list");
            Route::get("create", "ChiBoController@getCreate")->name("get.chibo.create");
            Route::post("create", "ChiBoController@postCreate")->name("post.chibo.create");
            Route::get("update/{id}", "ChiBoController@getUpdate")->name("get.chibo.update");
            Route::post("update/{id}", "ChiBoController@postUpdate")->name("post.chibo.update");
            Route::get("delete/{id}", "ChiBoController@delete")->name("get.chibo.delete");
        });
    });
});
