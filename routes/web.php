<?php

use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;
// '/' => home

//Route::get('/', function () {
//    return view('welcome');
//});

// -----------------------------------------
Route::get('/', function () {
    return view('index');
});

Route::get('/startup', function () {
    return 'Hello startup';
});

//Route::get('/category', function () {
//    return view('categories.index'); // ----------
//});

Route::get('category', [CategoryController::class,'index']);
//Route::get('result', [CategoryController::class,'result']);
//Route::get('product', [CategoryController::class,'product']);

// -----------------------------------------
