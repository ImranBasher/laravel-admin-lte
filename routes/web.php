<?php

use Illuminate\Support\Facades\Auth;

#A
use Illuminate\Support\Facades\Route;

#B
use App\Http\Controllers\BasicController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\ServiceController;
use App\Http\Controllers\v1\Website\BanglaPdfController;


Route::get("/pdf",[BanglaPdfController::class,"showBanglaPdf"])->name("showBanglaPdf");

// Route::get('/', function () {
    
// });

Route::get("/form", [BasicController::class, "basicForm"])->name("form");

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/', [HomeController::class, 'index'])->name('home');

// Route::get('/services/{service_category}/{sub_service_category}', [ServiceController::class, 'showSubService'])->name('services.subcategory');


Route::get('/services/{sub_service_category}', [ServiceController::class, 'showSubService'])
    ->name('services.subcategory');