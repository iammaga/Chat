<?php

use App\Http\Controllers\ChatController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MediaController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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

Route::post('register', [RegisterController::class, 'register']);
Route::post('login', [LoginController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {
    Route::group(['middleware' => 'role:admin'], function () {
        Route::apiResource('users', UserController::class);
    });

    Route::group(['middleware' => 'role:admin|user'], function () {
        Route::get('chats', [ChatController::class, 'index']);
        Route::apiResource('chats', ChatController::class);
    });

    Route::apiResources([
        'messages' => MessageController::class,
        'media' => MediaController::class,
        'contacts' => ContactController::class,
    ]);
});
