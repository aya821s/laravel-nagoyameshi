<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RestaurantController;
use App\Http\Controllers\SubscriptionController;
use App\Http\Controllers\WebController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\FavoriteController;

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

//有料会員限定に変更する//
Route::middleware(['auth', 'verified'])->group(function () {
    Route::resource('restaurants', RestaurantController::class);
    Route::get('/restaurants/{id}', [Restaurant::class, 'show']);
    Route::post('reviews', [ReviewController::class, 'store'])->name('reviews.store');
    Route::post('favorites/{restaurant_id}', [FavoriteController::class, 'store'])->name('favorites.store');
    Route::delete('favorites/{restaurant_id}', [FavoriteController::class, 'destroy'])->name('favorites.destroy');


    Route::get('/review', [ReviewController::class, 'index'])->name('restaurants.review');
});













Route::controller(SubscriptionController::class)->group(function () {

Route::get('subscription', function (Request $request) {
    return view('subscription/create');
})->middleware(['auth'])->name('subscription.create');

Route::get('subscription/edit','edit')->name('subscription.edit');
Route::get('subscription/cancel','cancel')->name('subscription.cancel');

Route::post('subscription', function (Request $request) {
    return view('subscription/store');
})->middleware(['auth'])->name('subscription.store');

});



require __DIR__.'/auth.php';
