<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Faker\Provider\Lorem;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(){

        $product_item = Product::all();
        return view('product.index', compact('product_item'));
    }

    public function create(){
        return view('product.create');
    }

    public function store(Request $request){
//        $data = $request->all();
//        dd($data);
        Product::create([
            "name" => $request->name,
            "type" => $request->type,
            "image" => $request->image,
            "price" => $request->price,
            "quantity" => $request->quantity,
        ]);
        return redirect()->route('productIndex');
    }

    public function edit($id){
        $data = Product::where('id', $id)->first();
        return view('product.edit', compact('data'));
    }

    public function update(Request $request){
        $data = Product::where('id', $request->id)->first();
        $data->update([
            'name' => $request->name,
            'type' => $request->type,
            'image' => $request->image,
            'price' => $request->price,
            'quantity' => $request->quantity,
        ]);
        return redirect()->route('productIndex');
    }


}

