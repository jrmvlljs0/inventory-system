<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\StockMovement;

class DashboardController extends Controller
{
    //Create functions that fetch product
    public function index()
    {
        // Get statistics
        $dashboardData = (object)[
            'totalProducts' => Product::count(),
            'activeProducts' => Product::where('is_active', true)->count(),
            'totalStock' => StockMovement::sum('quantity')
        ];

        // Get latest products with pagination
        $products = Product::latest()->paginate(10);
        
        // Get latest stock movements
        $stockMovements = StockMovement::with('product')
            ->latest()
            ->take(5)
            ->get();

        return view('dashboard', compact('dashboardData', 'products', 'stockMovements'));
    }
}