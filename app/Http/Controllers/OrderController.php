<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function checkout(Request $request)
    {
        $user = $request->user();
        $order = $user->currentOrder;

        if ($order && $order->orderDetails->isNotEmpty()) {
            $order->status = 'done';
            $order->save();

            $newOrder = $user->orders()->create([
                'status' => 'pending',
            ]);

            return response()->json(['message' => 'Checkout success!']);
        }

        return response()->json(['message' => 'Your cart is empty.'], 404);
    }
}
