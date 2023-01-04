<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\StackController;
use App\Http\Controllers\WorkController;
use App\Http\Middleware\AuthenticateJWT;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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

Route::group(['prefix' => 'auth', 'as'=> ''], function(){
    Route::post('/register', [AuthController::class, 'register']);
    Route::post('/login',    [AuthController::class, 'login']);
});



Route::middleware([AuthenticateJWT::class])->group(function(){
    Route::get('/me', [AuthController::class,'me']);
    Route::post('/messages', [MessageController::class,'store']);
    Route::post('/stacks', [StackController::class,'store']);
    Route::delete('/stacks/{id}', [StackController::class,'destroy']);
    Route::post('/works', [WorkController::class,'store']);
});

Route::get('/stacks', [StackController::class,'index']);
