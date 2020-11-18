<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api\UserControllerApi;
use App\Http\Controllers\api\LoginControllerApi;
use App\Http\Controllers\api\ProductAdminControllerApi;


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

Route::middleware('auth:sanctum')->get('/users', [UserControllerApi::class,'index']);
Route::middleware('auth:sanctum')->post('/user/{id}/edit', [UserControllerApi::class,'edit']);
Route::middleware('auth:sanctum')->post('/user/{id}/update', [UserControllerApi::class,'update']);
Route::middleware('auth:sanctum')->delete('/user/{id}/delete', [UserControllerApi::class,'destroy']);

Route::middleware('auth:sanctum')->get('/admin', [LoginControllerApi::class,'index']);
//Route::prefix('sanctum')->namespace('API')->group(function() {
//    Route::post('register',[LoginController::class,'register']);
//    Route::post('login',[LoginController::class,'register']);
//    Route::post('token', [LoginController::class,'token']);
//});
Route::middleware('auth:sanctum')->get('/name', function (Request $request) {
    return response()->json(['name' => $request->user()->name]);
});
