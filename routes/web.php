<?php

use App\Http\Controllers\ArticleController;
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
Route::get('product', [ProductController::class,'index'])->name('productIndex');

Route::get('/category/create', [CategoryController::class,'create'])->name('categoryCreate');
Route::post('/category/store', [CategoryController::class,'store'])->name('categoryStore');

Route::get('/category/{id}', [CategoryController::class,'edit'])->name('categoryEdit');
Route::post('/category/update/{id}', [CategoryController::class,'update'])->name('categoryUpdate');

Route::get('/product/create', [ProductController::class,'create'])->name('productCreate');
Route::post('/product/store', [ProductController::class,'store'])->name('productStore');

Route::get('/product/{id}', [ProductController::class,'edit'])->name('productEdit');
Route::post('/product/update/{id}', [ProductController::class,'update'])->name('productUpdate');

Route::post('/category/{deldata}', [CategoryController::class,'destroy'])->name('categoryDelete');
Route::post('/product/{productdel}', [ProductController::class,'destroy'])->name('productDelete');

Route::resource('articles', ArticleController::class)->only(['index','create','store']);
Route::resource('articles', ArticleController::class)->only(
    'edit'
);
Route::resource('articles', ArticleController::class)->only([
    'destroy'
]);
Route::resource('articles', ArticleController::class)->only([
    'update'
]);
//Route::resource('articles', ArticleController::class)->only(['index','create','store'])->names([
//    'index' => 'articlesIndex',
//    'create' => 'articlesCreate',
//    'store' => 'articlesStore',
//]);

