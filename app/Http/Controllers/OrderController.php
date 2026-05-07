<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function placeOrder(Request $request)
    {
        $order = Order::create([
            'user_id' => $request->user()->user_id,
            'total_amount' => $request->total_amount,
            'status' => 'pending'
        ]);

        foreach ($request->items as $item) {
            OrderItem::create([
                'order_id' => $order->order_id,
                'shoe_id' => $item['shoe_id'],
                'size_id' => $item['size_id'],
                'price' => $item['price'],
                'quantity' => $item['quantity']
            ]);
        }

        return response()->json([
            'message' => 'Order placed',
            'order' => $order
        ]);
    }

    public function userOrders(Request $request)
    {
        return Order::with('orderItems.shoe', 'orderItems.size')
            ->where('user_id', $request->user()->user_id)
            ->get();
    }

    public function updateStatus(Request $request, $id)
    {
        $order = Order::findOrFail($id);
        $order->update(['status' => $request->status]);

        return $order;
    }
}
