<?php

namespace App\Http\Controllers;

use Faker\Provider\Lorem;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(){
        $data = [
            [
                'Shirt',
                3200,
                'lorem ipsum',
            ],
            [
                'Bag',
                2800,
                'lorem ipsum',
            ],
            [
                'Jeans',
                5900,
                'lorem ipsum',
            ]
        ];
        return view('product.product', compact('data'));
    }
}
