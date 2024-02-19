<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::group(['prefix' => 'admin', 'middleware' => ['admin']], function(){
    Route::resource('profile', Admin\ProfileController::class, ['names' => 'profile']);
    Route::get('home/{type?}', [Admin\AdminHomeController::class, 'index'])->name('dashboard');
    Route::get('orders', [Admin\AdminHomeController::class, 'orders'])->name('orders');
    Route::resource('seo', Admin\SeoController::class, ['names' => 'seo']);
    Route::resource('testimonial', Admin\TestimonialController::class, ['names' => 'testimonial']);
    Route::resource('slider', Admin\SliderController::class, ['names' => 'slider']);
    Route::resource('logo', Admin\LogoController::class, ['names' => 'logo']);
    Route::resource('News', Admin\NewsController::class, ['names' => 'news']);
    Route::resource('category', Admin\CategoryController::class, ['names' => 'category']);
    Route::resource('Food', Admin\FoodController::class, ['names' => 'food']);
    Route::resource('Team', Admin\TeamController::class, ['names' => 'team']);
    Route::resource('About', Admin\AboutController::class, ['names' => 'about']);
    Route::resource('story', Admin\StoryController::class, ['names' => 'story']);
    Route::resource('SpecialDish', Admin\SpecialDishController::class, ['names' => 'specialDish']);
    Route::get('/admin-home', [Admin\AdminHomeController::class, 'home'])->name('home.index');
  });


require __DIR__.'/auth.php';
