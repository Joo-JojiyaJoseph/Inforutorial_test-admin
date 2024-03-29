<?php

namespace App\Providers;

use App\Models\Admin\Account;
use App\Models\Admin\Category;
use App\Models\Admin\Color;
use App\Models\Admin\Food;
use App\Models\Admin\News;
use App\Models\Admin\Product;
use App\Models\Admin\Game;
use App\Models\Admin\Logo;
use App\Models\Admin\SpecialDish;
use App\Models\Admin\Story;
use App\Models\Admin\Team;
use App\Models\Admin\Testimonial;
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
        if(Logo::count() == 0 ) {
            Logo::create([
                'image' => 'logo',
            ]);
        }
        if(Story::count() == 0 ) {
            Story::create([
                'title' => 'test',
            ]);
        }
        if(Food::count() == 0 ) {
            Food::create([
                'fdtitle' => 'test',
                'status'=>0,
                'stock'=>0,
            ]);
        }


        $specialDish = SpecialDish::join('food','food.id','=','special_dishes.dish_id')->Orderby('id', 'desc')->select('food.*')->first();
        $teams = Team::Orderby('id', 'desc')->get();
        $testimonials = Testimonial::Orderby('id', 'desc')->get();
        $cats = Category::Orderby('id', 'asc')->get();
        $foods = Food::join('categories','categories.id','=','food.cat')->Orderby('food.id', 'desc')->select('food.*','categories.title')->get();
        $story = Story::Orderby('id', 'desc')->first();
        $logo = Logo::first();
        View::share(compact('logo','cats','foods','testimonials','teams','story','specialDish'));
    }
}
