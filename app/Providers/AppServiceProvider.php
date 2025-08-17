<?php

namespace App\Providers;

use App\Models\GeneralSetting;
use App\Models\ServiceCategory;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        View::composer('*', function ($view) {
            /** @var User|null $user */
            $user = Auth::user();

            if ($user) {
                // Eager load relationships on the retrieved user
                $user->load(['profile', 'multipleImages']);
            }

           $view->with('authUser', $user ?? null);
        });

        $generalSetting = GeneralSetting::with(['multipleImages'])->first();
         View::share('general_setting', $generalSetting ?? null);
    
         // Share service categories with subcategories with all views
    $serviceCategories = ServiceCategory::with(['subServiceCategories'])
        ->where('status', true)
        ->orderBy('service_name')
        ->get();
            
    View::share('serviceCategories', $serviceCategories ?? collect());        



    }
}
