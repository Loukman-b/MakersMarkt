<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $query = $request->input('q');

        // Hardcoded producten
        $products = [
            [
                'title' => 'Handgemaakte Kaars',
                'price' => 29.99,
                'image' => '/img/Handgemaakte-producten.jpg'
            ],
            [
                'title' => 'Geurkaars',
                'price' => 19.99,
                'image' => '/img/Handgemaakte-producten.jpg'
            ],
            [
                'title' => 'Decoratieve Kaars',
                'price' => 24.99,
                'image' => '/img/Handgemaakte-producten.jpg'
            ],
            [
                'title' => 'Grote Kaars',
                'price' => 39.99,
                'image' => '/img/Handgemaakte-producten.jpg'
            ],
            [
                'title' => 'Mini Kaars',
                'price' => 14.99,
                'image' => '/img/Handgemaakte-producten.jpg'
            ],
        ];

        // Filter op zoekterm
        if ($query) {
            $products = array_filter($products, function($product) use ($query) {
                return stripos($product['title'], $query) !== false;
            });
        }

        return view('home', [
            'items' => $products,
            'query' => $query
        ]);
    }
}