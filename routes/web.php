<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\TransactionController;

Route::get('/', function () {
    return view('product.dashboard');
});

//route untuk product
Route::resource('products', ProductController::class);

//View
Route::get('/dashboard', [\App\Http\Controllers\ProductController::class, 'index'])->name('dashboard');
Route::get('/product', [\App\Http\Controllers\HalamanController::class, 'product'])->name('product');
Route::get('/transaction', [\App\Http\Controllers\HalamanController::class, 'transactions'])->name('transaction');
Route::get('/stocks', [\App\Http\Controllers\HalamanController::class, 'stocks'])->name('stocks');
Route::get('/report', [\App\Http\Controllers\HalamanController::class, 'report'])->name('report');

//route untuk login
Route::get('/login', function() {
    return view('auth.login');
})->name('login');

Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
  
//route untuk register
Route::get('/loginfor', [\App\Http\Controllers\AuthController::class, 'loginfor'])->name('loginfor');

// Menampilkan form register untuk admin
Route::get('/register-admin', [AuthController::class, 'showAdminRegisterForm'])->name('register.admin');

// Menampilkan form register untuk cashier
Route::get('/register-cashier', [AuthController::class, 'showCashierRegisterForm'])->name('register.cashier');

// Route untuk memproses register (POST)
Route::post('/register-admin', [AuthController::class, 'registerAdmin'])->name('register.admin.submit');
Route::post('/register-cashier', [AuthController::class, 'registerCashier'])->name('register.cashier.submit');

// crud product
Route::resource('products', ProductController::class);
//logika restock
Route::post('/products/{id_product}/add-stock', [ProductController::class, 'addStock'])->name('products.add-stock');

//crud category
Route::resource('categories', CategoryController::class); 

//restock
Route::get('products/{product}/restock', [ProductController::class, 'restockForm'])->name('products.restocks.show');
Route::put('products/{product}/restock', [ProductController::class, 'restock'])->name('products.restocks.update');

Route::resource('transactions', TransactionController::class);
Route::post('transactions/process', [TransactionController::class, 'processTransaction'])->name('transactions.process');