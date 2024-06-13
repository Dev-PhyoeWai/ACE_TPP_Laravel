<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;
// '/' => home

// -----------------------------------------
Route::get('/', function () {
    return view('index');
});

Route::get('/startup', function () {
    return 'Hello startup';
});

Route::get('category', [CategoryController::class,'index'])->name('categoryIndex');
//Route::get('result', [CategoryController::class,'result']);
Route::get('product', [ProductController::class,'index']);

Route::get('/category/create', [CategoryController::class,'create'])->name('categoryCreate');
Route::post('/category/store', [CategoryController::class,'store'])->name('categoryStore');

Route::get('/category/{id}', [CategoryController::class,'edit'])->name('categoryEdit');
Route::post('/category/update{id}', [CategoryController::class,'update'])->name('categoryUpdate');


