<?php

use App\Http\Controllers\backend\BrandController;
use App\Http\Controllers\backend\CategoryController;
use App\Http\Controllers\backend\DashboardController;
use App\Http\Controllers\backend\DelivermanController;
use App\Http\Controllers\backend\ProductController;
use App\Http\Controllers\backend\SubCategoryController;
use App\Http\Controllers\backend\UserRoleController;
use App\Http\Controllers\frontend\AuthController;
use App\Http\Controllers\frontend\HomepageController;
use App\Http\Controllers\UserRole;
use App\Models\Deliverman;
use Illuminate\Support\Facades\Route;

//frontend
Route::get('/login', [AuthController::class, 'login'])->name('web.login');
Route::get('/registration', [AuthController::class, 'registration'])->name('web.registration');
Route::post('/store_registration', [AuthController::class, 'do_registration'])->name('web.do.registration');
Route::post('/do-login', [AuthController::class, 'do_login'])->name('web.do.login');
Route::get('/', [HomepageController::class, 'home'])->name('homepage');


Route::get('/all-products', [ProductController::class, 'allProducts'])->name('web.allproducts');
Route::get('/product', [ProductController::class, 'singleProduct'])->name('web.singleproduct');
Route::get('/category-wise-products/{id}', [ProductController::class, 'catProducts'])->name('web.catProducts');




//backend

Route::group(['prefix' => 'admin'], function () {

    Route::get('/', [DashboardController::class, 'dashboard'])->name('dashboard');
    //category
    Route::get('/category_list', [CategoryController::class, 'categoryTable'])->name('category.table');
    Route::get('/category_add', [CategoryController::class, 'categoryAdd'])->name('category.add');
    Route::post('/category_store', [CategoryController::class, 'categoryStore'])->name('category.store');
    Route::get('/category_view/{id}', [CategoryController::class, 'categoryView'])->name('category.view');
    Route::get('/category_delete/{id}', [CategoryController::class, 'categoryDelete'])->name('category.delete');

    // subcat
    Route::get('/SubCategory', [SubCategoryController::class, 'ViewSubCat'])->name('subCat.table');
    Route::get('/add_sub-category', [SubCategoryController::class, 'addSubCat'])->name('subCat.add');
    Route::post('/store_sub-category', [SubCategoryController::class, 'storeSubCat'])->name('subCat.store');
    Route::get('/delete_sub-category/{id}', [SubCategoryController::class, 'deleteSubCat'])->name('subCat.delete');

    //brands
    Route::get('/brand', [BrandController::class, 'brandList'])->name('brand.list');
    Route::get('/add_brand', [BrandController::class, 'addBrand'])->name('brand.add');
    Route::post('/store_brand', [BrandController::class, 'storeBrand'])->name('brand.store');


    //products
    Route::get('/product_list', [ProductController::class, 'product_list'])->name('product.list');
    Route::get('/product_add', [ProductController::class, 'product_add'])->name('product.add');
    Route::post('/product_store', [ProductController::class, 'product_store'])->name('product.store');
    Route::get('/product_view/{id}', [ProductController::class, 'product_view'])->name('product.view');
    Route::get('/product_delete/{id}', [ProductController::class, 'product_delete'])->name('product.delete');


    //User Role
    Route::get('/user_role', [UserRoleController::class, 'userRole'])->name('userRole.table');
    Route::get('/add_user_role', [UserRoleController::class, 'addUserRole'])->name('add.userRole.table');
    Route::post('/store_user_role', [UserRoleController::class, 'storeUserRole'])->name('store.userRole.table');
    Route::get('/assign_role',[UserRoleController::class,'assignRole'])->name('assign.role');




    //delivery man
    Route::get('/deliverman_list', [DelivermanController::class, 'deliverManTable'])->name('deliverman.table');
    Route::get('/deliverman_add', [DelivermanController::class, 'delivermanAdd'])->name('deliverman.add');
    Route::post('/deliverman_store', [DelivermanController::class, 'delivermanStore'])->name('deliverman.store');
});
