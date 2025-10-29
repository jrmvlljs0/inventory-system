<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\StockMovement;
use Illuminate\Http\Request;

class ProductStockController extends Controller
{
    public function index()
    {
        $stockMovements = StockMovement::with('product')
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

    public function edit(StockMovement $stockMovement)
    {
        $products = Product::where('is_active', true)
                          ->orderBy('name')
                          ->get();
        return view('stock.edit', compact('stockMovement', 'products'));
    }


    
    public function store(Request $request)
    {
        // Logic to store stock information
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer',
            'reason' => 'required|string|max:255',
        ]);

        // Assuming StockMovement is a model that records stock changes
        StockMovement::create([
            'product_id' => $request->product_id,
            'quantity' => $request->quantity,
            'reason' => $request->reason,
        ]);

        return redirect()->route('stock.index')->with('success', 'Stock movement created successfully.');
    }

    public function update(Request $request, StockMovement $stockMovement)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer',
            'reason' => 'required|string|max:255',
        ]);

        $stockMovement->update([
            'product_id' => $request->product_id,
            'quantity' => $request->quantity,
            'reason' => $request->reason,
        ]);

        return redirect()->route('stock.index')->with('success', 'Stock movement updated successfully.');
    }
}
