<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
    public function index(Request $request)
    {
        $user = auth()->user();
        if ($request->user()->currentOrder) {
            $order = $request->user()->currentOrder;
            return view('dashboard.user.cart', compact('user', 'order'));
        }
    }

    public function add(Request $request)
    {
        $productId = $request->input('product_id');
        $quantity = $request->input('quantity');

        $order = $request->user()->currentOrder;

        if (!$order) {
            $order = $request->user()->orders()->create([
                'status' => 'pending',
            ]);
        }

        $product = Product::findOrFail($productId);

        $existingOrderDetail = $order->orderDetails()->where('product_id', $productId)->first();

        if ($existingOrderDetail) {
            $existingOrderDetail->quantity += $quantity;
            $existingOrderDetail->save();
        } else {
            $orderDetail = $order->orderDetails()->create([
                'product_id' => $productId,
                'quantity' => $quantity,
                'price' => $product->price,
            ]);
        }

        $totalPrice = $order->orderDetails()->sum(DB::raw('price * quantity'));

        if ($totalPrice === null) {
            $totalPrice = 0;
        }

        $order->total_price = $totalPrice;
        $order->save();

        return response()->json([
            'message' => 'Product added to cart successfully!',
            'order_detail_id' => $existingOrderDetail ? $existingOrderDetail->id : ($orderDetail->id ?? null),
        ]);
    }
    public function remove(Request $request)
    {
        $productId = $request->input('product_id');
        $user = $request->user();

        $order = $user->currentOrder;

        $orderDetail = $order->orderDetails()->where('product_id', $productId)->first();

        if ($orderDetail) {
            $orderDetail->delete();

            $totalPrice = $order->orderDetails()->sum(DB::raw('price * quantity'));
            $order->total_price = $totalPrice;
            $order->save();

            return response()->json(['message' => 'Product removed from cart successfully!']);
        }

        return response()->json(['message' => 'Product not found in cart.'], 404);
    }
}
