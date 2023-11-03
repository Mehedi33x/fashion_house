<?php

namespace App\Providers;

use App\Models\Category;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Schema;
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
        Paginator::useBootstrap();
        $all_category=Category::all();
        view()->share('category', $all_category);

        // $all_category = [];
        // if (Schema::hasTable('category')) {
        //     $all_category = Category::all();
        // }
        // View::share('category', $all_category);
    }
}
