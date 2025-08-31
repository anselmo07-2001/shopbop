<?php

namespace App\Providers;

use App\Models\TopCategory;
use Illuminate\Support\Facades\Cache;
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
        View::composer("components.sub-menu", function($view) {
            $subMenu = Cache::remember("subMenu", 3600, function() {
                return TopCategory::with("midCategories.endCategories.products")
                         ->where("show_on_menu", 1)->get();
            });

            $view->with('subMenu', $subMenu);   
        });
    }
}
