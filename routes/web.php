<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ShopController;
use App\Http\Middleware\AuthAdmin;
use Illuminate\Support\Facades\Route;



Route::get('/', [HomeController::class, 'index'])->name('home.index');
Route::get('/shop',[ShopController::class, 'index'])->name('shop.index');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [UserController::class, 'index'])->name('user.index');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy'); 
});

Route::middleware([AuthAdmin::class])->group(function () {
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');

    // Brands
    Route::get('/admin/brands',[BrandController::class, 'brands'])->name('admin.brands');
    Route::get('/admin/brands/create',[BrandController::class, 'addBrand'])->name('brands.create');
    Route::post('/admin/brands/store',[BrandController::class, 'storeBrand'])->name('brands.store');
    Route::get('/admin/brands/edit/{id}',[BrandController::class,'editBrand'])->name('brands.edit');
    Route::put('/admin/brands/update/{id}',[BrandController::class,'updateBrand'])->name('brands.update');
    Route::delete('/admin/brand/delete/{id}',[BrandController::class,'deleteBrand'])->name('brands.delete');

    // Category
    Route::get('/admin/category',[CategoryController::class,'category'])->name('admin.category');
    Route::get('/admin/category/create',[CategoryController::class, 'addcategory'])->name('category.create');
    Route::post('/admin/category/store',[CategoryController::class,'storeCategory'])->name('category.store');
    Route::get('/admin/category/edit/{id}',[CategoryController::class, 'editCategory'])->name('category.edit');
    Route::put('/admin/category/update/{id}',[CategoryController::class,'updateCategory'])->name('category.update');
    Route::delete('/admin/category/delete/{id}',[CategoryController::class,'deleteCategory'])->name('category.delete');

    // Products
    Route::get('/admin/products',[ProductController::class, 'products'])->name('admin.products');
    Route::get('/admin/products/create',[ProductController::class, 'addProduct'])->name('product.create');
    Route::post('/admin/products/store',[ProductController::class, 'storeProduct'])->name('product.store');
    Route::get('/admin/product/edit/{id}',[ProductController::class, 'editProduct'])->name('product.edit');
    Route::put('/admin/products/update/{id}',[ProductController::class, 'updateProduct'])->name('product.update');
    Route::delete('/admin/products/delete/{id}',[ProductController::class, 'deleteProduct'])->name('product.delete');
    Route::delete('/admin/products/bulkDelete',[ProductController::class, 'muiltpleDeleteProduct'])->name('product.bulkDelete');
    Route::get('/admin/product/export',[ProductController::class, 'productExport'])->name('product.export');
});

require __DIR__.'/auth.php';    