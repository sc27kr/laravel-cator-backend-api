<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\Auth\LoginController;
use App\Http\Controllers\Api\Auth\LogoutController;
use App\Http\Controllers\Api\Auth\RegisterController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

require __DIR__ . '/api/v1.php';

Route::prefix('auth')->group(function () {
    Route::post('/login', LoginController::class)->name('login');
    Route::post('/logout', LogoutController::class)->middleware('auth:sanctum')->name('logout');
    Route::post('/register', RegisterController::class)->name('register');
});


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
