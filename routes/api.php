<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegistrarController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\LogueadoMiddleware;


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

Route::prefix('user')->middleware(LogueadoMiddleware::class)->group(function () {
    Route::get('', [UserController::class, 'getAll']);
    Route::post('', [UserController::class, 'insert']);
});

Route::post('login',[LoginController::class,'authenticate']);

Route::post('register',[RegistrarController::class,'register']);




