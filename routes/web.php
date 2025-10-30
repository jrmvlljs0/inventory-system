<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProductStockController;
use Illuminate\Support\Facades\Route;
use App\Models\Product;
use App\Models\StockMovement;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    
    //fetch latest products with pagination
    $products = Product::latest()->paginate(10);



    //count total products
    $totalProducts = Product::count();

    //count active and inactive products
    $activeProducts = Product::where('is_active', true)->count();

    //sum the quantity column in stock movements table
    $totalStock = StockMovement::sum('quantity');
    
    //return to dashboard view with the data passed to it
    return view('dashboard', compact('products','totalProducts', 'activeProducts', 'totalStock'));
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::resource('products', ProductController::class)->middleware('auth');

// Stock routes for managing product stock movements 
Route::middleware('auth')->group(function () {
    Route::get('/stock', [ProductStockController::class, 'index'])->name('stock.index');
    Route::get('/stock/create', [ProductStockController::class, 'create'])->name('stock.create');
    Route::post('/stock/create', [ProductStockController::class, 'store'])->name('stock.store');
    Route::get('/stock/{stockMovement}/edit', [ProductStockController::class, 'edit'])->name('stock.edit');
    Route::put('/stock/{stockMovement}', [ProductStockController::class, 'update'])->name('stock.update');
    Route::delete('/stock/{stockMovement}', [ProductStockController::class, 'destroy'])->name('stock.destroy');
});

require __DIR__.'/auth.php';
