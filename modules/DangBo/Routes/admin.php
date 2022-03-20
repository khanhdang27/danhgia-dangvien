<?php

use Illuminate\Support\Facades\Route;

Route::middleware('admin')->group(function () {
    Route::prefix("dangbo")->group(function () {
        Route::get("/", "DangBoController@index")->name("get.dangbo.list");
        Route::get("create", "DangBoController@getCreate")->name("get.dangbo.create");
        Route::post("create", "DangBoController@postCreate")->name("post.dangbo.create");
        Route::get("update/{id}", "DangBoController@getUpdate")->name("get.dangbo.update");
        Route::post("update/{id}", "DangBoController@postUpdate")->name("post.dangbo.update");
        Route::get("delete/{id}", "DangBoController@delete")->name("get.dangbo.delete");
    });
});
