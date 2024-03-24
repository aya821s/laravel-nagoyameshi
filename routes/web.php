<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RestaurantController;

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

Route::controller(UserController::class)->group(function () {
    Route::get('user/mypage', 'mypage')->name('mypage');
    Route::get('user/mypage/edit', 'edit')->name('mypage.edit');
    Route::put('user/mypage', 'update')->name('mypage.update');
});

Route::get('/', function () {
    return view('welcome');
});

Route::resource('restaurants', RestaurantController::class);
Route::get('/restaurants/{id}', [Restaurant::class, 'show']);

require __DIR__.'/auth.php';
