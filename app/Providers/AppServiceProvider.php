<?php

namespace App\Providers;

use App\Models\PageSetting;
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


        View::composer("components.header", function($view) {
            $cart = json_decode(request()->cookie("cart", "[]"), true);

            $total = collect($cart)->reduce(function ($carry, $item) {
                return $carry + ($item['quantity'] * ($item['price'] ?? 0));
            }, 0);

            $view->with('cartTotal', $total);
        });

        View::composer("*", function($view) {
            $global_page_settings = PageSetting::select(
                "footer_copyright",
                "contact_email",
                "contact_phone"
            )->first();

            $view->with("global_page_settings", $global_page_settings);
        });
    }
}
