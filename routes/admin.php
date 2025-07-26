<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\MailController;
use App\Http\Controllers\Admin\AuthorController;
use App\Http\Controllers\Admin\WorkerController;
use App\Http\Controllers\Admin\AdminProfileController;
// use App\Http\Controllers\AdminProfileController;
use App\Http\Controllers\Admin\AboutUsController;
use App\Http\Controllers\Admin\CommentController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\WhyChooseController;
use App\Http\Controllers\Admin\MainBannerController;
use App\Http\Controllers\Admin\MotivationController;
use App\Http\Controllers\Admin\FooterBannerController;
use App\Http\Controllers\Admin\CustomerReviewController;
use App\Http\Controllers\Admin\GeneralSettingController;
use App\Http\Controllers\Admin\ServiceSectionController;
use App\Http\Controllers\Admin\ServiceCategoryController;
use App\Http\Controllers\Admin\ScrollingHeadingController;
use App\Http\Controllers\Admin\SubServiceCategoryController;
use App\Http\Controllers\Admin\Dashboard\DashboardController;
use App\Http\Controllers\Admin\FrequentlyAskQuestionController;



Route::prefix("admin")->name("admin.")->middleware('admin.auth')->group(function () {

    #Dashboard
    Route::prefix("dashboard")->name("dashboard.")->group(function () {
        Route::get("/", [DashboardController::class, "index"])->name("index");
    });
    // Admin profile route
    Route::get('profile', [AdminProfileController::class, 'edit'])->name('profile.edit');
    Route::post('profile', [AdminProfileController::class, 'update'])->name('profile.update');


    Route::get('/general/setting',[GeneralSettingController::class, 'index'])->name('all.general.setting');
    Route::put('/general-settings/update/{general_settings}', [GeneralSettingController::class, 'update'])->name('general-settings.update');

    Route::resource('authors',                AuthorController::class)->names('authors');
    Route::resource('blogs',                  BlogController::class)->names('blogs');
    Route::resource('comments',               CommentController::class)->names('comments');
    Route::resource('faqs',                   FrequentlyAskQuestionController::class) ->names('faqs');
    Route::resource('main_banners',           MainBannerController::class)->names('main_banners');
    Route::resource('motivations',            MotivationController::class)->names('motivations');
    Route::resource('send_mails',             MailController::class)->names('send_mails');
    Route::resource('service_sections',       ServiceSectionController::class)->names('service_sections');
    Route::resource('service_categories',     ServiceCategoryController::class)->names('service_categories');
    Route::resource('sub_service_categories', SubServiceCategoryController::class)->names('sub_service_categories');
    Route::resource('scrolling_headings',     ScrollingHeadingController::class)->names('scrolling_headings');
    Route::resource('why_chooses',            WhyChooseController::class)->names('why_chooses');
    Route::resource('workers',                WorkerController::class)->names('workers');
    Route::resource('products',               ProductController::class)->names('products');
    Route::resource('about_us',               AboutUsController::class)->names('about_us');
    Route::resource('footer_banners',         FooterBannerController::class)->names('footer_banners');
    Route::resource('customer_reviews',       CustomerReviewController::class)->names('customer_reviews');

Route::delete('/admin/blogs/images/{id}', [BlogController::class, 'deleteImage'])->name('blogs.images.destroy');

    
});