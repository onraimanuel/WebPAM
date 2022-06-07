<?php

use App\Http\Controllers\ItemMenuKantinController;
use App\Http\Controllers\ItemMenuKantinControllerApi;
use App\Http\Controllers\ItemMenuPulsaController;
use App\Http\Controllers\ItemMenuPulsaControllerApi;
use App\Http\Controllers\TransaksiMenuKantinControllerApi;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post("login", [UserController::class, 'login'])->name('user.login');
Route::post("register", [UserController::class, 'register'])->name('user.register');

Route::get("item-menu-kantin/all", [ItemMenuKantinControllerApi::class, 'index']);

Route::get("item-menu-pulsa/all", [ItemMenuPulsaControllerApi::class, 'index']);

Route::post("transaksi-menu-kantin/store", [TransaksiMenuKantinControllerApi::class, 'store'])->name('transaksi-menu-kantin.store');
Route::post("transaksi-menu-kantin/daftar", [TransaksiMenuKantinControllerApi::class, 'daftar'])->name('transaksi-menu-kantin.daftar');
