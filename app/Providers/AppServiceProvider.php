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

        View::share('general_setting', GeneralSetting::with(['multipleImages'])->first() ?? null);

         // Share service categories with subcategories with all views
        View::share('serviceCategories', ServiceCategory::with(['subServiceCategories'])
            ->where('status', true)
            ->orderBy('service_name')
            ->get() ?? null);
    }
}
