<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RestaurantController;
use App\Http\Controllers\SubscriptionController;
use App\Http\Controllers\WebController;

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
});

Route::resource('restaurants', RestaurantController::class);
Route::get('/restaurants/{id}', [Restaurant::class, 'show']);



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
