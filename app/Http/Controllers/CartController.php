<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\CartItem;
use Illuminate\Http\Request;

class CartController extends Controller
{
    // ✅ GET CART ITEMS
    public function index()
    {
        return CartItem::with('shoe')
            ->whereHas('cart', function ($q) {
                $q->where('user_id',1); // TEMP (without login)
            })
            ->get();
    }

    // ✅ ADD TO CART
    public function store(Request $request)
    {
      dd($request->all());
     $request->validate([
    'shoe_id' => 'required|exists:shoes,shoe_id', // ✅ FIXED
    'quantity' => 'required|integer|min:1'
]);

        $cart = Cart::firstOrCreate([
            'user_id' => 1 // TEMP (without login)
        ]);

        $item = CartItem::where('cart_id', $cart->id)
            ->where('shoe_id', $request->shoe_id)
            ->first();

        if ($item) {
            $item->quantity += $request->quantity;
            $item->save();
        } else {
            CartItem::create([
                'cart_id' => $cart->id,
                'shoe_id' => $request->shoe_id,
                'quantity' => $request->quantity
            ]);
        }

        return response()->json(['message' => 'Added to cart']);
    }

    // ✅ REMOVE ITEM
    public function destroy($id)
    {
        CartItem::findOrFail($id)->delete();

        return response()->json(['message' => 'Removed']);
    }
}