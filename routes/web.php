<?php

use App\Models\Deliverman;
use App\Http\Controllers\UserRole;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\backend\AuthController;
use App\Http\Controllers\backend\UserController;
use App\Http\Controllers\backend\BrandController;
use App\Http\Controllers\backend\ProductController;
use App\Http\Controllers\backend\CategoryController;
use App\Http\Controllers\backend\UserRoleController;
use App\Http\Controllers\backend\DashboardController;
use App\Http\Controllers\frontend\HomepageController;
use App\Http\Controllers\backend\DelivermanController;
use App\Http\Controllers\backend\SubCategoryController;
// use App\Http\Controllers\frontend\AuthController as FrontendAuthController;

//frontend
Route::get('/login', [AuthController::class, 'login'])->name('web.login');
Route::get('/registration', [AuthController::class, 'registration'])->name('web.registration');
Route::post('/store_registration', [AuthController::class, 'do_registration'])->name('web.do.registration');
Route::post('/do-login', [AuthController::class, 'do_login'])->name('web.do.login');

Route::get('/forget_password', [AuthController::class, 'forget_password'])->name('web.forget.password');
Route::post('/reset_link', [AuthController::class, 'reset_link'])->name('web.forget.password.link');
Route::post('/password_reset/{token}', [AuthController::class, 'passwordResetMail'])->name('web.password.mail');

Route::get('/logout', [AuthController::class, 'do_logout'])->name('web.logout');
Route::get('/', [HomepageController::class, 'home'])->name('homepage');


Route::get('/all-products', [ProductController::class, 'allProducts'])->name('web.allproducts');
Route::get('/product', [ProductController::class, 'singleProduct'])->name('web.singleproduct');
Route::get('/category-wise-products/{id}', [ProductController::class, 'catProducts'])->name('web.catProducts');




//backend
Route::get('/admin_login', [AuthController::class, 'adminLogin'])->name('admin.login');
Route::post('/admin_store', [AuthController::class, 'checkAdmin'])->name('admin.store');
Route::group(['prefix' => 'admin', 'middleware' => ['auth']], function () {
    Route::get('/admin_logout', [AuthController::class, 'logout'])->name('admin.logout');
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
    Route::get('/product_yajratable', [ProductController::class, 'product_yajratable'])->name('product.yajratable');
    Route::get('/product_add', [ProductController::class, 'product_add'])->name('product.add');
    Route::post('/product_store', [ProductController::class, 'product_store'])->name('product.store');
    Route::get('/product_view/{id}', [ProductController::class, 'product_view'])->name('product.view');
    Route::get('/product_delete/{id}', [ProductController::class, 'product_delete'])->name('product.delete');


    // User
    Route::get('/user_table', [UserController::class, 'userTable'])->name('user.table');
    Route::get('/add_user', [UserController::class, 'addUser'])->name('add.user');
    Route::post('/store_user', [UserController::class, 'storeUser'])->name('store.user');
    Route::get('/user_profile', [UserController::class, 'profileUser'])->name('profile.user');

    //User Role
    Route::get('/user_role', [UserRoleController::class, 'userRole'])->name('userRole.table');
    Route::get('/add_user_role', [UserRoleController::class, 'addUserRole'])->name('add.userRole.table');
    Route::post('/store_user_role', [UserRoleController::class, 'storeUserRole'])->name('store.userRole.table');
    Route::get('/assign_role/{role_id}', [UserRoleController::class, 'assignRole'])->name('assign.role');
    Route::post('/submit_role_permission/{role_id}', [UserRoleController::class, 'submitRolePermission'])->name('submit.role.permission');




    //delivery man
    Route::get('/deliverman_list', [DelivermanController::class, 'deliverManTable'])->name('deliverman.table');
    Route::get('/deliverman_add', [DelivermanController::class, 'delivermanAdd'])->name('deliverman.add');
    Route::post('/deliverman_store', [DelivermanController::class, 'delivermanStore'])->name('deliverman.store');
});
