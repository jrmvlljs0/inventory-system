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
}
