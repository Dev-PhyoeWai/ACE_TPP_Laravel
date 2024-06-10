<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
class CategoryController extends Controller
{
    public function index(){

        $data = [
            [
                'Phyoe',
                'Wai',
                20,
            ],
            [
                'Aung',
                'Aung',
                24,
            ],
            [
                'Ma',
                'Mya',
                21,
            ]
        ];
//        dd($data);
        return view('categories.index', compact('data'));
    }
    public function result(){
        return view('categories.result');
    }

}
