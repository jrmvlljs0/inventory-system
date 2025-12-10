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

    // SEARCH FUNCTION - to search the index value on stock table
   public function search(Request $request)
{
    $search = $request->search;

    $query = StockMovement::with('product')->latest();

    if ($search) {
        if (is_numeric($search)) {
            $query->where(function ($q) use ($search) {
                $q->where('product_id', $search)
                  ->orWhere('quantity', $search);
            });
        } else {
            $query->where(function ($q) use ($search) {
                $q->whereHas('product', function ($p) use ($search) {
                    $p->where('name', 'like', "%{$search}%");
                })
                ->orWhere('reason', 'like', "%{$search}%");
            });
        }
    }

    $movements = $query->paginate(10);

    $data = $movements->map(function ($movement) {
        return [
            'id' => $movement->id,
            'product_id' => $movement->product_id,
            'product_name' => optional($movement->product)->name,
            'quantity' => $movement->quantity,
            'reason' => $movement->reason,
            'created_at' => $movement->created_at->toDateTimeString(),
        ];
    });

    return response()->json([
        'data' => $data->values(),
        'pagination' => [
            'current_page' => $movements->currentPage(),
            'last_page' => $movements->lastPage(),
            'per_page' => $movements->perPage(),
            'total' => $movements->total(),
        ],
    ]);
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
