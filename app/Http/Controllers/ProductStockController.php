<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\StockMovement;
use Illuminate\Http\Request;

class ProductStockController extends Controller
{
    public function index()
    {
        $stockMovements = \App\Models\StockMovement::with('product')
            ->latest()
            ->paginate(10);
            
        return view('stock.index', compact('stockMovements'));
    }

    public function create()
    {
        $products = Product::where('is_active', true)
                          ->orderBy('name')
                          ->get();
        return view('stock.create', compact('products'));
    }
    public function store(Request $request)
    {
        // Logic to store stock information
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer',
            'type' => 'required|in:addition,removal',
        ]);

        // Assuming StockMovement is a model that records stock changes
        StockMovement::create([
            'product_id' => $request->product_id,
            'quantity' => $request->type === 'addition' ? $request->quantity : -$request->quantity,
        ]);

        return redirect()->route('stock.index')->with('success', 'Stock updated successfully.');
    }
}
