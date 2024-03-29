<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RestaurantController;
use App\Http\Controllers\WebController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\SubscriptionController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/',  [WebController::class, 'index'])->name('top');

Route::controller(UserController::class)->group(function () {
    Route::get('user/mypage', 'mypage')->name('mypage');
    Route::get('user/mypage/edit', 'edit')->name('mypage.edit');
    Route::put('user/mypage', 'update')->name('mypage.update');
    Route::get('users/mypage/favorite', 'favorite')->name('mypage.favorite');
    Route::get('users/delete', 'delete')->name('user.delete');
    Route::delete('users/delete', 'destroy')->name('mypage.destroy');
});


Route::middleware(['auth', 'verified'])->group(function () {
    Route::resource('restaurants', RestaurantController::class);
    Route::get('/restaurants/{id}', [RestaurantController::class, 'show']);
    Route::get('/review', [ReviewController::class, 'index'])->name('restaurants.review');

    Route::get('/subscription', [SubscriptionController::class, 'create'])->name('subscription.create');
    Route::post('/subscription/store', [SubscriptionController::class, 'store'])->name('subscription.store');


    //サブスクに移行する//
    Route::post('reviews', [ReviewController::class, 'store'])->name('reviews.store');
    
});

Route::middleware(['subscribed'])->group(function () {

   
    Route::post('favorites/{restaurant_id}', [FavoriteController::class, 'store'])->name('favorites.store');
    Route::delete('favorites/{restaurant_id}', [FavoriteController::class, 'destroy'])->name('favorites.destroy');

    
    Route::get('/subscription/edit', [SubscriptionController::class, 'edit'])->name('subscription.edit');
    Route::patch('/subscription/update', [SubscriptionController::class, 'update'])->name('subscription.update');
    Route::get('/subscription/cancel', [SubscriptionController::class, 'cancel'])->name('subscription.cancel');
    Route::post('/subscription/cancel', [SubscriptionController::class, 'destroy'])->name('subscription.destroy');
    
});





require __DIR__.'/auth.php';
