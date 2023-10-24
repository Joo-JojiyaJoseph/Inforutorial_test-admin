<?php

namespace App\Providers;

use App\Models\Admin\Account;
use App\Models\Admin\Category;
use App\Models\Admin\Color;
use App\Models\Admin\News;
use App\Models\Admin\Product;
use App\Models\Admin\Game;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {

    }
}
