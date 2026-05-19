<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    // Controller to handle Product related requests
    // INDEX FUNCTION - To display a listing of the products
    public function index(Request $request)
    {

        $query = Product::query();

        // fetch products from the database with pagination
        $products = $query->latest()->paginate(10);

        // return to the products index view with the products data
        return view('products.index', compact('products'));
    }

    // CREATE FUNCTION - To show the form for creating a new product in inventory
    public function create()
    {
        // return to the create product view
        return view('products.create');
    }

    // STORE FUNCTION - To store a newly created product in inventory
    public function store(Request $request)
    {
        // validate the incoming request data
        $validatedStoreProduct = $request->validate([
            'name' => 'required|string|max:255',
            'sku' => 'required|string|max:100|unique:products,sku',
            'description' => 'nullable|string',
        ]);
        // create the product record
        Product::create($validatedStoreProduct);

        // redirect to products index with success message
        return redirect()->route('products.index')->with('success', 'Product created successfully.');
    }

    // SHOW FUNCTION - To display the specified product details
    public function show(Product $product)
    {
        // create search function on product table

        return view('products.show', compact('product'));
    }

    //SEARCH FUNCTION - search the index value of product table such as name and sku
 public function search(Request $request)
        {
            $search = $request->search;

            $productsQuery = Product::query();

            if ($search) {
                $productsQuery->where('name', 'like', "%{$search}%")
                            ->orWhere('sku', 'like', "%{$search}%");
            }

            // eager load stock movements to calculate stock
            $products = $productsQuery->with('stockMovements')->paginate(10);

            // map products to include computed stock_quantity
            $data = $products->map(function ($product) {
                return [
                    'id' => $product->id,
                    'name' => $product->name,
                    'sku' => $product->sku,
                    'description' => $product->description,
                    'stock_quantity' => $product->stockMovements->sum('quantity'), // total stock
                ];
            });

            return response()->json([
                'data' => $data,
                'pagination' => [
                    'current_page' => $products->currentPage(),
                    'last_page' => $products->lastPage(),
                    'per_page' => $products->perPage(),
                    'total' => $products->total(),
                ],
            ]);
        }

    // EDIT FUNCTION - To show the form for editing the specified product in inventory
    public function edit(Product $product)
    {
        // return to the edit product view with the product data
        return view('products.edit', compact('product'));
    }


    // UPDATE FUNCTION - To update the specified product in inventory
    public function update(Request $request, Product $product)
    {

        // validate the incoming request data
        $validatedProductUpdate = $request->validate([
            'name' => 'required|string|max:255',
            'sku' => 'required|string|max:100|unique:products,sku,'.$product->id,
            'description' => 'nullable|string',
        ]);
        // update the product record
        $product->update($validatedProductUpdate);

        // redirect to products index with success message
        return redirect()->route('products.index')->with('success', 'Product updated successfully.');
    }

    // DELETE FUNCTION - To delete the specified product in inventory
    public function destroy(Product $product)
    {
        // delete the product record
        $product->delete();

        // redirect to products index with success message
        return redirect()->route('products.index')->with('success', 'Product deleted successfully.');
    }
}
