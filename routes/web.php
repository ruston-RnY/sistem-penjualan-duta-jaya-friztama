<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SupplierController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [DashboardController::class,'index'])->name('dashboard');

Route::resource('products', '\App\Http\Controllers\ProductController');
Route::get('/search-product', [ProductController::class,'search'])->name('search-product');
Route::post('/products/sorting', [ProductController::class,'sorting'])->name('sorting-products');

Route::resource('suppliers', '\App\Http\Controllers\SupplierController');
Route::get('/search-supplier', [SupplierController::class,'search'])->name('search-supplier');
Route::post('/suppliers/sorting', [SupplierController::class,'sorting'])->name('sorting-suppliers');

Route::resource('customers', '\App\Http\Controllers\CustomerController');
Route::resource('transactions', '\App\Http\Controllers\TransactionController');

Route::get('/login', [LoginController::class, 'index'])->name('login');
