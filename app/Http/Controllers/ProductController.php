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

    //SEARCH FUNCTION - search the index value of product table
    public function search(Request $request)
    {

        $searchBar = $request->input('search');

        $products = Product::query();

        // conditional applly the search filter
        if ($searchBar) {
            $products->where(function ($q) use ($searchBar) {
                $q->where('name', 'like', "%{$searchBar}%")
                    ->orWhere('sku', 'like', "%{$searchBar}%");

                if (strtotime($searchBar)) {
                    $q->orWhereDate('created_at', date('Y-m-d', strtotime($searchBar)))
                        ->orWhereDate('updated_at', date('Y-m-d', strtotime($searchBar)));
                }
            });
        }

        $products = $products->paginate(10)->withQueryString();

        return view('products.index', compact('products'));

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
