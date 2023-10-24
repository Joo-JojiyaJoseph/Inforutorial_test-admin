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

Route::get('/', function () {
    return view('index');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');


Route::get('/admin', [Admin\AdminController::class, 'index'])->name('admin.login');
Route::post('/admin', [Admin\AdminController::class, 'login'])->name('admin.login');
Route::get('/admin-logout', [Admin\AdminController::class, 'logout'])->name('admin.logout');
Route::group(['prefix' => 'admin', 'middleware' => ['admin']], function(){
    Route::resource('profile', Admin\ProfileController::class, ['names' => 'profile']);

    Route::get('home/{type?}', [Admin\AdminHomeController::class, 'index'])->name('dashboard');

    Route::resource('seo', Admin\SeoController::class, ['names' => 'seo']);
      Route::resource('testimonial', Admin\TestimonialController::class, ['names' => 'testimonial']);

       Route::resource('slider', Admin\SliderController::class, ['names' => 'slider']);
  });


require __DIR__.'/auth.php';
