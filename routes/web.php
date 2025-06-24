<?php

use Illuminate\Support\Facades\Route;

#A
use Illuminate\Support\Facades\Auth;

#B
use App\Http\Controllers\v1\Website\BanglaPdfController;
use App\Http\Controllers\BasicController;


Route::get("/pdf",[BanglaPdfController::class,"showBanglaPdf"])->name("showBanglaPdf");

Route::get('/', function () {
    
});

Route::get("/form", [BasicController::class, "basicForm"])->name("form");

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
