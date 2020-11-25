<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductAdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CategoryControllerFront;


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
Route::middleware('auth:sanctum')->group(function (){
    Route::get('/admin', [App\Http\Controllers\LoginController::class,'index'])->name('admin');
    Route::get('/users', [UserController::class,'index'])->name('users');
    Route::post('/user/{id}/edit', [UserController::class,'edit'])->name('user_edit');
    Route::post('/user/{id}/update', [UserController::class,'update'])->name('user_update');
    Route::get('/user/{id}/delete', [UserController::class,'destroy'])->name('user_delete');

    Route::get('/admin/categories/{page?}', [CategoryController::class,'index'])->name('admin_categories');
    Route::get('/admin/category/create', [CategoryController::class,'create'])->name('admin_category_create');
    Route::post('/admin/category/store', [CategoryController::class,'store'])->name('admin_category_store');
    Route::post('/admin/category/{id}/update', [CategoryController::class,'update'])->name('admin_category_edit');
    Route::post('/admin/category/{id}/delete', [CategoryController::class,'destroy'])->name('admin_category_delete');
    Route::post('/admin/category/{id}/show', [CategoryController::class,'show'])->name('admin_category_show');

    

    Route::get('/products', [\App\Http\Controllers\ProductControllerAdmin::class,'index'])->name('products');
    Route::get('/product/create', [\App\Http\Controllers\ProductControllerAdmin::class,'create'])->name('product_create');
    Route::get('/product/store', [\App\Http\Controllers\ProductControllerAdmin::class,'store'])->name('product_store');
    Route::get('/product/{product}/update', [\App\Http\Controllers\ProductControllerAdmin::class,'update'])->name('product_update');
    Route::get('/products/{product}/delete', [\App\Http\Controllers\ProductControllerAdmin::class,'destroy'])->name('product_delete');
    Route::get('/products/show', [\App\Http\Controllers\ProductControllerAdmin::class,'show'])->name('product_show');

    Route::get('/products', [\App\Http\Controllers\ProductControllerFront::class,'index'])->name('products');
    Route::get('/products', [\App\Http\Controllers\ProductControllerFront::class,'index'])->name('products');
});



//---------------------
//-----  Front  -------
//---------------------
Route::get('/categories', [CategoryControllerFront::class,'index'])->name('categories_front');

Route::post('/category/{id}/show', [CategoryControllerFront::class,'show'])->name('category_show');