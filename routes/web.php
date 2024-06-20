<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;
// '/' => home

// -----------------------------------------
Route::get('/', function () {
    return view('welcome');
});
//Route::get('/', function () {
//    return view('index');
//});

Route::get('category', [CategoryController::class,'index'])->name('categoryIndex')->middleware('auth');
//Route::get('result', [CategoryController::class,'result']);
Route::get('product', [ProductController::class,'index'])->name('productIndex')->middleware('auth');

Route::get('/category/create', [CategoryController::class,'create'])->name('categoryCreate')->middleware('auth');
Route::post('/category/store', [CategoryController::class,'store'])->name('categoryStore')->middleware('auth');

Route::get('/category/{id}', [CategoryController::class,'edit'])->name('categoryEdit')->middleware('auth');
Route::post('/category/update/{id}', [CategoryController::class,'update'])->name('categoryUpdate')->middleware('auth');

Route::get('/product/create', [ProductController::class,'create'])->name('productCreate')->middleware('auth');
Route::post('/product/store', [ProductController::class,'store'])->name('productStore')->middleware('auth');

Route::get('/product/{id}', [ProductController::class,'edit'])->name('productEdit')->middleware('auth');
Route::post('/product/update/{id}', [ProductController::class,'update'])->name('productUpdate')->middleware('auth');

Route::post('/category/{deldata}', [CategoryController::class,'destroy'])->name('categoryDelete')->middleware('auth');
Route::post('/product/{productdel}', [ProductController::class,'destroy'])->name('productDelete')->middleware('auth');

Route::resource('articles', ArticleController::class)->middleware('auth')->middleware('auth');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
