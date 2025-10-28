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
    $products = Product::latest()->paginate(10);
    $totalProducts = Product::count();
    $activeProducts = Product::where('is_active', true)->count();
    $inactiveProducts = Product::where('is_active', false)->count();

    $totalStock = StockMovement::count();
    $totalActiveStock = StockMovement::where('quantity', '>', 0)->count();
    $totalInactiveStock = StockMovement::where('quantity', '<', 0)->count();
    
    return view('dashboard', compact('products', 'totalProducts', 'activeProducts', 'inactiveProducts', 'totalStock', 'totalActiveStock', 'totalInactiveStock'));
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::resource('products', ProductController::class)->middleware('auth');

// Stock routes
Route::middleware('auth')->group(function () {
    Route::get('/stock', [ProductStockController::class, 'index'])->name('stock.index');
    Route::get('/stock/create', [ProductStockController::class, 'create'])->name('stock.create');
    Route::post('/stock/create', [ProductStockController::class, 'store'])->name('stock.store');
});

require __DIR__.'/auth.php';
