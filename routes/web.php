<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductStockController;
use App\Http\Controllers\ProfileController;
use App\Models\Product;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// adding verfied to each routes that need to secure
Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

// adding verfied to each routes that need to secure
Route::middleware('auth', 'verified')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// adding verfied to each routes that need to secure
// Stock/Prodcut routes for managing product stock movements
Route::middleware('auth', 'verified')->group(function () {

    // This route correctly handles the GET request from your search form
    Route::get('/products/search', [ProductController::class, 'search'])->name('products.search');

    // You will also need your index route to show the full list (used when search box is cleared)
    Route::get('/products', [ProductController::class, 'index'])->name('products.index');

    // products controller functions
    Route::resource('products', ProductController::class)->middleware('auth');

    // search route
    Route::get('/stock/search', [ProductStockController::class, 'search'])->name('stock.search');

    //Stock index route
    Route::get('/stock', [ProductStockController::class, 'index'])->name('stock.index');

    //Stock create route ::POST - create stock
    Route::get('/stock/create', [ProductStockController::class, 'create'])->name('stock.create');
    
    //Stock store route ::POST - store stock
    Route::post('/stock/create', [ProductStockController::class, 'store'])->name('stock.store');

    //Stock edit route :: GET - Edit Stock
    Route::get('/stock/{stockMovement}/edit', [ProductStockController::class, 'edit'])->name('stock.edit');

    //Stock Update route ::PUT - Update Stock
    Route::put('/stock/{stockMovement}', [ProductStockController::class, 'update'])->name('stock.update');

    //Stock destroy route ::DELETE - delete stock
    Route::delete('/stock/{stockMovement}', [ProductStockController::class, 'destroy'])->name('stock.destroy');
});

require __DIR__.'/auth.php';
