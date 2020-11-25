<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api\UserControllerApi;
use App\Http\Controllers\api\CategoryControllerApi;
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
Route::middleware('auth:sanctum')->group(function (){
    Route::get('/users', [UserControllerApi::class,'index']);
    Route::post('/user/{id}/edit', [UserControllerApi::class,'edit']);
    Route::post('/user/{id}/update', [UserControllerApi::class,'update']);
    Route::delete('/user/{id}/delete', [UserControllerApi::class,'destroy']);

    Route::get('/admin/categories', [CategoryControllerApi::class,'index']);
    Route::get('/category/create', [CategoryControllerApi::class,'create']);
    Route::post('/category/store', [CategoryControllerApi::class,'store']);
    Route::post('/category/{id}/update', [CategoryControllerApi::class,'store']);
    Route::get('/category/{id}/delete', [CategoryControllerApi::class,'destroy']);
    Route::post('/category/{id}/show', [CategoryControllerApi::class,'show']);

    Route::get('/products', [\App\Http\Controllers\api\ProductControllerApi::class,'index']);
    Route::get('/product/create', [\App\Http\Controllers\api\ProductControllerApi::class,'create']);
    Route::get('/product/store', [\App\Http\Controllers\api\ProductControllerApi::class,'store']);
    Route::get('/product/{product}/update', [\App\Http\Controllers\api\ProductControllerApi::class,'update']);
    Route::get('/products/{product}/delete', [\App\Http\Controllers\api\ProductControllerApi::class,'destroy']);
    Route::get('/products/show', [\App\Http\Controllers\api\ProductControllerApi::class,'show']);

    Route::get('/admin', [LoginControllerApi::class,'index']);
});


