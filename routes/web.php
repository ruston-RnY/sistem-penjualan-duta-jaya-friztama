<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\TransactionController;
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
Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate'])->name('loginUser');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::middleware('auth')->group(function(){
    Route::get('/', [DashboardController::class,'index'])->name('dashboard');
    
    Route::resource('products', '\App\Http\Controllers\ProductController');
    Route::get('/search-product', [ProductController::class,'search'])->name('search-product');
    Route::get('/print-products', [ProductController::class,'print'])->name('print-products');
    Route::post('/products/sorting', [ProductController::class,'sorting'])->name('sorting-products');
    
    Route::resource('suppliers', '\App\Http\Controllers\SupplierController');
    Route::get('/search-supplier', [SupplierController::class,'search'])->name('search-supplier');
    Route::get('/print-suppliers', [SupplierController::class,'print'])->name('print-suppliers');
    Route::post('/suppliers/sorting', [SupplierController::class,'sorting'])->name('sorting-suppliers');
    
    Route::resource('customers', '\App\Http\Controllers\CustomerController');
    Route::get('/print-customers', [CustomerController::class,'print'])->name('print-customers');
    
    Route::resource('transactions', '\App\Http\Controllers\TransactionController');
    Route::get('/print-transactions', [TransactionController::class,'print'])->name('print-transactions');
    Route::get('/print-transactions/{id}', [TransactionController::class,'printDetail'])->name('print-detail-transactions');
    
    Route::resource('laporan', '\App\Http\Controllers\LaporanController');
    Route::resource('users', '\App\Http\Controllers\UserController');
});