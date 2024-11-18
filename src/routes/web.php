<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\DetailController;

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
    Route::get('/', [AuthController::class, 'index']);
    Route::get('/', [ShopController::class, 'index']);
    Route::get('/detail/{shop_id}', [DetailController::class, 'detail']);
    Route::post('/detail/{shop_id}', [ReservationController::class, 'store']);
    Route::get('/reservation_thanks', [ReservationController::class, 'thankYou']);
});