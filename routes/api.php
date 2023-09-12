<?php

use App\Http\Controllers\api\CategoryController;
use App\Http\Controllers\api\ProductController;
use Illuminate\Http\Request;
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


Route::get('/all-products', [ProductController::class, 'allProducts']);
Route::get('/single-product/{id}', [ProductController::class, 'singleProduct']);
Route::post('/create-product',[ProductController::class,'createProduct']);
Route::delete('/delete-product/{id}',[ProductController::class,'deleteProduct']);
Route::put('/edit-product/{id}',[ProductController::class,'editProduct']);


//category
Route::get('/all-category',[CategoryController::class,'allCatgeory']);
Route::get('/single-category/{id}',[CategoryController::class,'singleCatgeory']);
Route::post('/create-category',[CategoryController::class,'createCategory']);
