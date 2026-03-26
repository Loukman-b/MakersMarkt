<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CartController extends Controller
{
    public function add(Request $request, $itemIndex)
    {
        $products = [
            ['title'=>'Handgemaakte Kaars','price'=>29.99,'image'=>'/img/Handgemaakte-producten.jpg'],
            ['title'=>'Geurkaars','price'=>19.99,'image'=>'/img/Handgemaakte-producten.jpg'],
            ['title'=>'Decoratieve Kaars','price'=>24.99,'image'=>'/img/Handgemaakte-producten.jpg'],
            ['title'=>'Grote Kaars','price'=>39.99,'image'=>'/img/Handgemaakte-producten.jpg'],
            ['title'=>'Mini Kaars','price'=>14.99,'image'=>'/img/Handgemaakte-producten.jpg'],
        ];

        $item = $products[$itemIndex] ?? null;

        if (!$item) return back();

        $quantity = max(1, (int) $request->input('quantity', 1));

        $cart = session()->get('cart', []);

        if (isset($cart[$itemIndex])) {
            $cart[$itemIndex]['quantity'] += $quantity;
        } else {
            $cart[$itemIndex] = [
                'title' => $item['title'],
                'price' => $item['price'],
                'image' => $item['image'],
                'quantity' => $quantity
            ];
        }

        session()->put('cart', $cart);

        return back();
    }

    
    public function remove($itemIndex)
    {
        $cart = session()->get('cart', []);

        unset($cart[$itemIndex]);

        session()->put('cart', $cart);

        return back();
    }

    
    public function update(Request $request, $itemIndex)
    {
        $cart = session()->get('cart', []);

        if (isset($cart[$itemIndex])) {
            $quantity = max(1, (int) $request->input('quantity'));
            $cart[$itemIndex]['quantity'] = $quantity;
        }

        session()->put('cart', $cart);

        return back();
    }

    
    public function index()
    {
        $cart = session()->get('cart', []);
        return view('cart.index', compact('cart'));
    }
}