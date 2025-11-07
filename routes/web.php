<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProductStockController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;
use App\Models\Product;
use App\Models\StockMovement;
use App\Models\Dashboard;

Route::get('/', function () {
    return view('welcome');
});


//adding verfied to each routes that need to secure
Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');


//adding verfied to each routes that need to secure
Route::middleware('auth','verified')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

//adding verfied to each routes that need to secure
// Stock/Prodcut routes for managing product stock movements 
Route::middleware('auth','verified')->group(function () {

    //products controller functions
    Route::resource('products', ProductController::class)->middleware('auth');


    //stocks movement controller
    Route::get('/stock', [ProductStockController::class, 'index'])->name('stock.index');
    Route::get('/stock/create', [ProductStockController::class, 'create'])->name('stock.create');
    Route::post('/stock/create', [ProductStockController::class, 'store'])->name('stock.store');
    Route::get('/stock/{stockMovement}/edit', [ProductStockController::class, 'edit'])->name('stock.edit');
    Route::put('/stock/{stockMovement}', [ProductStockController::class, 'update'])->name('stock.update');
    Route::delete('/stock/{stockMovement}', [ProductStockController::class, 'destroy'])->name('stock.destroy');
});

require __DIR__.'/auth.php';
 