<?php

use Illuminate\Support\Facades\Auth;

#A
use Illuminate\Support\Facades\Route;

#B
use App\Http\Controllers\BasicController;
use App\Http\Controllers\Frontend\BlogController;
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

Route::get('service/subservice/{id}', [ServiceController::class, 'showServiceWiseSubServices'] )->name('service.subservice');
Route::get('/services/{sub_service_category}', [ServiceController::class, 'showSubService'])->name('services.subcategory');



Route::get('/blog/list', [BlogController::class, 'index'])->name('blog.list');   
Route::get('blog/{id}',  [BlogController::class, 'show'])->name('frontend.blog.details'); 
Route::get('/about',     [HomeController::class, 'aboutUs'])->name('about.us');  
Route::get('contact/us', [HomeController::class, 'contactUs'])->name('contact.us');
Route::get('our/team',   [HomeController::class, 'ourTeam'])->name('our.team');
Route::post('customer/mail', [HomeController::class, 'mailStore'])->name('send.customer.mail');
