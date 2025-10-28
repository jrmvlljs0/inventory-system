<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    //Controller to handle Product related requests
    public function index()
    {
        //fetch all products from the database
        $products = Product::all();
        return view('products.index', compact('products'));
    }

    //show the form for creating a new product
    public function create()
    {
        return view('products.create');
    }

    //Store a newly created product in storage
    public function store (Request $request)
    {
        //validate and store the new product
        // $validated = $request->validate([
        //     'name' => 'required|string|max:255',
        //     'sku' => 'required|string|max:100|unique:products,sku',
        //     'description' => 'nullable|string',
        // ]);
        $request->validate([
            'name' => 'required|string|max:255',
            'sku' => 'required|string|max:100|unique:products,sku',
            'description' => 'nullable|string',
        ]);
        Product::create($request->all());
        return redirect()->route('products.index')->with('success', 'Product created successfully.');
    }

    //display the specified product
    public function show(Product $product)
    {
        return view('products.show', compact('product'));
    }

    //show the form for editing the specified product
    public function edit(Product $product)
    {
        return view('products.edit', compact('product'));
    }

    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'sku' => 'required|string|max:100|unique:products,sku,' . $product->id,
            'description' => 'nullable|string',
        ]);

        $product->update($request->all());
        return redirect()->route('products.index')->with('success', 'Product updated successfully.');
    }

    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('products.index')->with('success', 'Product deleted successfully.');
    }
    
}

