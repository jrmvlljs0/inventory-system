<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\StockMovement;
use Illuminate\Http\Request;

class ProductStockController extends Controller
{
    // Display a listing of the stock movements
    public function index(Request $request)
    {

        $stocks = StockMovement::with('product');

        $stockMovements = $stocks->latest()->paginate(10);

        return view('stock.index', compact('stockMovements'));
    }

    // CREATE FUNCTION - To show the form for creating a new product in inventory
    public function create()
    {
        // fetch active products for selection
        $products = Product::where('is_active', true)
            ->orderBy('name')
            ->get();

        // return to the create stock movement view with the products data
        return view('stock.create', compact('products'));
    }

    // STORE FUNCTION - To store a newly created product in inventory
    public function store(Request $request)
    {
        // Validate the incoming request data
        $validatedStockProduct = $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer',
            'reason' => 'required|string|max:255',
        ]);

        // Create the stock movement record
        StockMovement::create($validatedStockProduct);

        // redirect to stock index with success message
        return redirect()->route('stock.index')->with('success', 'Stock movement created successfully.');
    }

    public function search(Request $request)
    {

        $searchBar = $request->input('search');

        $stock = StockMovement::with('product')->latest();

        if ($searchBar) {
            $stock->where(function ($q) use ($searchBar) {
                $q->where('quantity', 'like', "%{$searchBar}%");
                // ->orWhere('quantity', '=', "%{$searchBar}%");

                if (strtotime($searchBar)) {
                    $q->orWhereDate('created_at', date('Y-m-d', strtotime($searchBar)))
                        ->orWhereDate('updated_at', date('Y-m-d', strtotime($searchBar)));
                }
            });
            $stock->orWhereHas('product', function ($q) use ($searchBar) {
                $q->where('name', 'like', "%{$searchBar}%")
                    ->orWhere('sku', 'like', "%{$searchBar}%");
            });
        }
        $stockMovements = $stock->paginate(10)->withQueryString();

        return view('stock.index', compact('stockMovements'));
    }

    // EDIT FUNCTION - To show the form for editing the specified product in inventory
    public function edit(StockMovement $stockMovement)
    {
        // fetch active products for selection
        $stocks = Product::where('is_active', true)
            ->orderBy('name')
            ->get();

        // return to the edit stock movement view with the stock movement and products data
        return view('stock.edit', compact('stockMovement', 'stocks'));
    }

    // UPDATE FUNCTION - To update the specified product in inventory
    public function update(Request $request, StockMovement $stockMovement)
    {

        // validate the incoming request data
        $validatedStockProductUpdate = $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer',
            'reason' => 'required|string|max:255',
        ]);

        // update the stock movement record
        $stockMovement->update($validatedStockProductUpdate);

        // redirect to stock index with success message
        return redirect()->route('stock.index')->with('success', 'Stock movement updated successfully.');
    }

    // DELETE FUNCTION - To delete the specified stocks in inventory
    public function destroy(StockMovement $stockMovement)
    {
        $stockMovement->delete();

        return redirect()->route('stock.index')->with('success', 'Stock movement deleted successfully.');

    }
}
