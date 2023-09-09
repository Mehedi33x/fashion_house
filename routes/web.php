<?php

use App\Http\Controllers\backend\CategoryController;
use App\Http\Controllers\backend\DashboardController;
use App\Http\Controllers\backend\ProductController;
use Illuminate\Support\Facades\Route;







Route::get('/', [DashboardController::class, 'dashboard'])->name('dashboard');
Route::get('/category_table', [CategoryController::class, 'categoryTable'])->name('category.table');
Route::get('/category_add', [CategoryController::class, 'categoryAdd'])->name('category.add');
Route::post('/category_store', [CategoryController::class, 'categoryStore'])->name('category.store');
Route::get('/category_view/{id}',[CategoryController::class,'categoryView'])->name('category.view');
Route::get('/category_delete/{id}',[CategoryController::class,'categoryDelete'])->name('category.delete');


Route::get('/product_list', [ProductController::class, 'product_list'])->name('product.list');
Route::get('/product_add', [ProductController::class, 'product_add'])->name('product.add');
Route::post('/product_store', [ProductController::class, 'product_store'])->name('product.store');
Route::get('/product_view/{id}', [ProductController::class, 'product_view'])->name('product.view');
Route::get('/product_delete/{id}',[ProductController::class,'product_delete'])->name('product.delete');


// Route::get('/deliverman_table',[]);
