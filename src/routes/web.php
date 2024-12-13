<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\AdminController;

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

Route::middleware('auth')->group(function () {
    Route::get('/', [ShopController::class, 'index']);
    Route::get('/detail', [ShopController::class, 'index'])->name('shop.detail');
    Route::POST('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('/mypage', [AdminController::class, 'index'])->name('mypage');

    Route::post('/detail/{shop_id}/reservation', [ReservationController::class, 'store'])->name('reservation.store');
    Route::delete('/mypage/reservation/delete',[AdminController::class, 'reservationDestroy'])->name('reservation.delete');

    Route::post('/favorite',[FavoriteController::class, 'store']);
    Route::delete('/mypage/favorite/delete',[AdminController::class, 'favoriteDestroy'])->name('favorite.delete');

    Route::get('/done', [ReservationController::class, 'done'])->name('reservation.done');
    Route::get('/thanks', [RegisterController::class, 'thanks'])->name('register.thanks');

    Route::post('/search', [ShopController::class, 'search'])->name('search');
});