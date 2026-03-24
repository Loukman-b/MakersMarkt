<?php

use App\Models\Product;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $products = Product::where('is_approved', true)->get();
    return view('home', ['products' => $products]);
});
