<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\StockMovement;
use Illuminate\Http\Request;

class ProductStockController extends Controller
{

    // Display a listing of the stock movements
    public function index()
    {
        //fetch stock movements with associated product data and paginate
        $stockMovements = StockMovement::with('product')
            ->latest()
            ->paginate(10);
            
        return view('stock.index', compact('stockMovements'));
    }

    //CREATE FUNCTION - To show the form for creating a new product in inventory
    public function create()
    {
        //fetch active products for selection
        $products = Product::where('is_active', true)
                          ->orderBy('name')
                          ->get();

        //return to the create stock movement view with the products data
        return view('stock.create', compact('products'));
    }

    //STORE FUNCTION - To store a newly created product in inventory
    public function store(Request $request)
    {
        // Validate the incoming request data 
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer',
            'reason' => 'required|string|max:255',
        ]);

        // Create the stock movement record
        StockMovement::create($request->all());

        //redirect to stock index with success message
        return redirect()->route('stock.index')->with('success', 'Stock movement created successfully.');
    }

    //EDIT FUNCTION - To show the form for editing the specified product in inventory
    public function edit(StockMovement $stockMovement)
    {
        //fetch active products for selection
        $products = Product::where('is_active', true)
                          ->orderBy('name')
                          ->get();

        //return to the edit stock movement view with the stock movement and products data
        return view('stock.edit', compact('stockMovement', 'products'));
    }

    //UPDATE FUNCTION - To update the specified product in inventory
    public function update(Request $request, StockMovement $stockMovement)
    {

        //validate the incoming request data
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer',
            'reason' => 'required|string|max:255',
        ]);

        //update the stock movement record
        $stockMovement->update($request->all());

        //redirect to stock index with success message
        return redirect()->route('stock.index')->with('success', 'Stock movement updated successfully.');
    }

     //DELETE FUNCTION - To delete the specified stocks in inventory
    public function destroy(StockMovement $stockMovement)
    {
        $stockMovement->delete();
        return redirect()->route('stock.index')->with('success', 'Stock movement deleted successfully.');

    }
}
