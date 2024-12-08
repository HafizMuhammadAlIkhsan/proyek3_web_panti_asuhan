<?php

namespace App\Providers;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Auth;

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
        Paginator::useBootstrapFive();

        View::composer('components.sidebaradmin', function ($view) {
            $admin = Auth::guard('admin')->user();
            $view->with('admin', $admin);
        });

        View::composer('components.sidebardonatur', function ($view) {
            $donatur = Auth::guard('donatur')->user();
            $view->with('donatur', $donatur);
        });
    }
}
