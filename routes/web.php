<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductAdminController;
use App\Http\Controllers\CategoryController;

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

Route::get('/', function () {
    return view('welcome');
})->name('home');

//Route::get('/login',  [LoginController::class, 'index']);


Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
Route::middleware('auth:sanctum')->get('/admin', [App\Http\Controllers\LoginController::class,'index'])->name('admin');
Route::middleware('auth:sanctum')->get('/users', [UserController::class,'index'])->name('users');
Route::middleware('auth:sanctum')->post('/user/{id}/edit', [UserController::class,'edit'])->name('user_edit');
Route::middleware('auth:sanctum')->post('/user/{id}/update', [UserController::class,'update'])->name('user_update');
Route::middleware('auth:sanctum')->get('/user/{id}/delete', [UserController::class,'destroy'])->name('user_delete');

Route::middleware('auth:sanctum')->get('/categories', [CategoryController::class,'index'])->name('categories');
Route::middleware('auth:sanctum')->get('/category/create', [CategoryController::class,'create'])->name('category_create');
Route::middleware('auth:sanctum')->post('/category/store', [CategoryController::class,'store'])->name('category_store');
Route::middleware('auth:sanctum')->post('/category/{id}/update', [CategoryController::class,'store'])->name('category_edit');
Route::middleware('auth:sanctum')->post('/category/{id}/delete', [CategoryControllerApi::class,'destroy'])->name('category_delete');