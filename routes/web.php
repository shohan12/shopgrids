<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EcomerceController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SubCategoryController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\UnitController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\CustomerAuthController;
use App\Http\Controllers\CustomerDashboardController;
use App\Http\Controllers\AdminOrderController;
use Laravel\Jetstream\Rules\Role;

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

Route::get('/', [EcomerceController::class,'index'])->name('home');
Route::get('/product-category/{id}',[EcomerceController::class,'categoryProduct'])->name('product-category');
Route::get('/product-sub-category/{id}',[EcomerceController::class,'subcategoryProduct'])->name('product-sub-category');
Route::get('/product-category/{id}',[EcomerceController::class,'categoryProduct'])->name('product-category');
Route::get('/product-detail-info/{id}', [EcomerceController::class, 'productDetail'])->name('product-detail');

Route::get('/show-cart-product',[CartController::class,'index'])->name('show-cart');
Route::post('/add-to-cart/{id}', [CartController::class, 'index'])->name('add-to-cart');
Route::get('/show-cart-product', [CartController::class, 'show'])->name('show-cart');
Route::post('/update-cart-product/{id}', [CartController::class, 'update'])->name('update-cart-product');
Route::get('/delete-cart-product/{id}', [CartController::class, 'delete'])->name('delete-cart-product');

Route::get('/checkout',[CheckoutController::class,'index'])->name('checkout');
Route::post('/new-order', [CheckoutController::class, 'newOrder'])->name('new-order');
Route::get('/complete-order', [CheckoutController::class, 'completeOrder'])->name('complete-order');

Route::middleware(['auth:sanctum',  config('jetstream.auth_session'), 'verified'])->group(function () {
Route::get('/dashboard', [DashboardController::class,'index'])->name('dashboard');});

Route::get('/customer-login', [CustomerAuthController::class, 'login'])->name('customer-login');
Route::post('/customer-login-check', [CustomerAuthController::class, 'loginCheck'])->name('customer-login-check');
Route::get('/customer-register', [CustomerAuthController::class, 'register'])->name('customer-register');
Route::post('/new-customer', [CustomerAuthController::class, 'newCustomer'])->name('new-customer');

Route::get('/customer-dashboard', [CustomerDashboardController::class, 'index'])->name('customer-dashboard')->middleware('customer');
Route::get('/customer-logout', [CustomerAuthController::class, 'logout'])->name('customer-logout');


Route::get('/add-category',[CategoryController::class,'index'])->name('category.add');
Route::get('/edit-category/{id}',[CategoryController::class,'edit'])->name('category.edit');
Route::post('/new-category',[CategoryController::class,'create'])->name('category.new');
Route::get('/manage-category',[CategoryController::class,'manage'])->name('category.manage');
Route::post('/update-category/{id}',[CategoryController::class,'update'])->name('category.update');
Route::get('/delete-category/{id}',[CategoryController::class,'delete'])->name('category.delete');

Route::get('/add-sub-category',[SubCategoryController::class,'index'])->name('subcategory.add');
Route::post('/new-sub-category',[SubCategoryController::class,'create'])->name('subcategory.create');
Route::get('/manage-sub-category',[SubCategoryController::class,'manage'])->name('subcategory.manage');
Route::get('/edit-sub-category/{id}', [SubCategoryController::class, 'edit'])->name('subcategory.edit');
Route::post('/update-sub-category/{id}',[SubCategoryController::class,'update'])->name('subcategory.update');
Route::post('/delete-sub-category/{id}',[SubCategoryController::class,'delete'])->name('subcategory.delete');


Route::get('/add-brand',[BrandController::class,'index'])->name('brand.add');
Route::post('/new-brand',[BrandController::class,'create'])->name('brand.create');
Route::get('/manage-brand',[BrandController::class,'manage'])->name('brand.manage');
Route::get('/edit-brand/{id}', [BrandController::class, 'edit'])->name('brand.edit');
Route::post('/update-brand/{id}',[BrandController::class,'update'])->name('brand.update');
Route::get('/delete-brand/{id}',[BrandController::class,'delete'])->name('brand.delete');

Route::get('/add-unit',[UnitController::class,'index'])->name('unit.add');
Route::post('/new-unit',[UnitController::class,'create'])->name('unit.create');
Route::get('/manage-unit',[UnitController::class,'manage'])->name('unit.manage');
Route::get('/edit-unit/{id}', [UnitController::class, 'edit'])->name('unit.edit');
Route::post('/update-unit/{id}',[UnitController::class,'update'])->name('unit.update');
Route::get('/delete-unit/{id}',[UnitController::class,'delete'])->name('unit.delete');



Route::get('/add-product',[ProductController::class,'index'])->name('product.add');
Route::get('/get-sub-category-by-category-id',[ProductController::class,'getSubCategory'])->name('product.sub-category');
Route::post('/new-product', [ProductController::class, 'create'])->name('product.new');
Route::get('/manage-product',[ProductController::class,'manage'])->name('product.manage');
Route::get('/product-detail/{id}', [ProductController::class, 'detail'])->name('product.detail');
Route::get('/edit-product/{id}', [ProductController::class, 'edit'])->name('product.edit');
Route::post('/update-product/{id}', [ProductController::class, 'update'])->name('product.update');
Route::get('/delete-product/{id}', [ProductController::class, 'delete'])->name('product.delete');

Route::get('/admin-order-manage', [AdminOrderController::class, 'index'])->name('admin.order-manage');
Route::get('/admin-order-detail/{id}', [AdminOrderController::class, 'detail'])->name('admin.order-detail');
Route::get('/admin-order-invoice/{id}', [AdminOrderController::class, 'invoice'])->name('admin.order-invoice');
Route::get('/admin-order-invoice-download/{id}', [AdminOrderController::class, 'downloadInvoice'])->name('admin.invoice-download');
Route::get('/admin-order-edit/{id}', [AdminOrderController::class, 'edit'])->name('admin.order-edit');
Route::post('/admin-order-update/{id}', [AdminOrderController::class, 'update'])->name('admin.order-update');
Route::get('/admin-order-delete/{id}', [AdminOrderController::class, 'delete'])->name('admin.order-delete');