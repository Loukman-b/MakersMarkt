<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function show($index)
    {
        $products = [
            ['title'=>'Handgemaakte Kaars','price'=>29.99,'image'=>'/img/Handgemaakte-producten.jpg'],
            ['title'=>'Geurkaars','price'=>19.99,'image'=>'/img/Handgemaakte-producten.jpg'],
            ['title'=>'Decoratieve Kaars','price'=>24.99,'image'=>'/img/Handgemaakte-producten.jpg'],
            ['title'=>'Grote Kaars','price'=>39.99,'image'=>'/img/Handgemaakte-producten.jpg'],
            ['title'=>'Mini Kaars','price'=>14.99,'image'=>'/img/Handgemaakte-producten.jpg'],
        ];

        $item = $products[$index] ?? null;

        if (!$item) {
            abort(404);
        }

        return view('product.show', compact('item', 'index'));
    }
}