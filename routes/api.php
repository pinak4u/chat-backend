<?php

use App\Http\Controllers\Api\MessageController;
use App\Http\Controllers\Api\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\TokenController;

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


// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::group(['middleware'=>'auth:sanctum'], function () {
    Route::post('/delete-token', [TokenController::class, 'deleteToken']);

    Route::get('/user',[UserController::class,'getLoggedInUser']);
    Route::get('/all-user',[UserController::class,'getAllUsers']);

    Route::post('/create-message',[MessageController::class,'createMessage']);
    Route::get('/load-messages-for-users/{toUser}',[MessageController::class,'loadAllMessageForUsers']);
});
