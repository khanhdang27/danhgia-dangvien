<?php
use Illuminate\Support\Facades\Route;

Route::middleware('admin')->group(function (){
    Route::get("/", "DashboardController@index")->name("admin.dashboard");
});
