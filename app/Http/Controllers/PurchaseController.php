<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;
use App\Models\Order;
use Illuminate\Support\Facades\DB;

class PurchaseController extends Controller
{
    public function buy(Request $request, Item $item)
    {
        $buyer = $request->user();
        $seller = $item->user;

        // Check: cannot buy your own item
        if ($buyer->id === $item->user_id) {
            return back()->with('error', 'Je kunt je eigen item niet kopen');
        }

        // cheken: voldoet aan de credit
        if ($buyer->credit < $item->price) {
            return back()->with('error', 'Niet genoeg credit');
        }

        DB::transaction(function () use ($buyer, $seller, $item) {

            // aftrek de credit
            $buyer->decrement('credit', $item->price);

            // voeg de credit toe aan de verkoper
            $seller->increment('credit', $item->price);

            
            Order::create([
                'user_id' => $buyer->id,
                'item_id' => $item->id,
                'status' => 'paid',
            ]);
        });

        $buyer->refresh();

        return redirect()->back()->with('success', 'Item succesvol gekocht! Je hebt nu ' . $buyer->credit . ' credits.');
    }
}