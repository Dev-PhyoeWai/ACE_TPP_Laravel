<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Faker\Provider\Lorem;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(){


        $product_item = Product::all();
        return view('product.product', compact('product_item'));
    }
}
