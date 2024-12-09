<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\MyPageController;

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
    Route::POST('/logout', [AuthController::class, 'logout']);
    Route::get('/detail/{shop_id}', [ReservationController::class, 'index']);
    Route::get('/detail/{shop_id}/reservation', [ReservationController::class, 'store']);
    Route::post('/detail/{shop_id}/reservation', [ReservationController::class, 'store']);
    Route::get('/done', [ReservationController::class, 'done']);
    Route::post('detail/{shop_id}/favorite',[FavoriteController::class, 'favorite'])->middleware('auth');
    Route::get('/my_page', [MyPageController::class, 'index']);
});