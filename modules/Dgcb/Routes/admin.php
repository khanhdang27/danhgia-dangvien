<?php

use Illuminate\Support\Facades\Route;

Route::middleware('admin')->group(function () {
    Route::prefix("dgcb")->group(function () {
        Route::group(['middleware' => 'can:dgcb'], function () {
            Route::get("/", "DgcbController@index")->name("get.dgcb.list")->middleware('can:dgcb');
            Route::post("/", "DgcbController@updateDgcb")->name("post.dgcb.list")->middleware('can:dgcb');
        });
    });
});
