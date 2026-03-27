<?php

namespace App\Http\Controllers;

use App\Models\Item;

class ProductController extends Controller
{
    public function show(Item $item)
    {
        return view('product.show', compact('item'));
    }
}