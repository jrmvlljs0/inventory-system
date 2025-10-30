<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    //Controller to handle Product related requests
    //INDEX FUNCTION - To display a listing of the products
    public function index()
    {
        //fetch products from the database with pagination
        $products = Product::latest()->paginate(10);

        //return to the products index view with the products data
        return view('products.index', compact('products'));
    }

    //CREATE FUNCTION - To show the form for creating a new product in inventory
    public function create()
    {
        //return to the create product view
        return view('products.create');
    }

    //STORE FUNCTION - To store a newly created product in inventory
    public function store (Request $request)
    {
        //validate the incoming request data
        $request->validate([
            'name' => 'required|string|max:255',
            'sku' => 'required|string|max:100|unique:products,sku',
            'description' => 'nullable|string',
        ]);
        //create the product record
        Product::create($request->all());

        //redirect to products index with success message
        return redirect()->route('products.index')->with('success', 'Product created successfully.');
    }

    //SHOW FUNCTION - To display the specified product details  
    public function show(Product $product)
    {
        return view('products.show', compact('product'));
    }

    //EDIT FUNCTION - To show the form for editing the specified product in inventory
    public function edit(Product $product)
    {
        //return to the edit product view with the product data
        return view('products.edit', compact('product'));
    }


    //UPDATE FUNCTION - To update the specified product in inventory
    public function update(Request $request, Product $product)
    {

        //validate the incoming request data
        $request->validate([
            'name' => 'required|string|max:255',
            'sku' => 'required|string|max:100|unique:products,sku,' . $product->id,
            'description' => 'nullable|string',
        ]);
        //update the product record
        $product->update($request->all());

        //redirect to products index with success message
        return redirect()->route('products.index')->with('success', 'Product updated successfully.');
    }

    //DELETE FUNCTION - To delete the specified product in inventory
    public function destroy(Product $product)
    {
        //delete the product record
        $product->delete();

        //redirect to products index with success message
        return redirect()->route('products.index')->with('success', 'Product deleted successfully.');
    }
    
}

