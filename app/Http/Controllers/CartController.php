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

        // Lakukan validasi jika diperlukan

        // Dapatkan instance order untuk pengguna saat ini
        $order = $request->user()->currentOrder;

        // Jika belum ada order, buat order baru
        if (!$order) {
            $order = $request->user()->orders()->create([
                'status' => 'pending',
            ]);
        }

        // Dapatkan produk berdasarkan product_id
        $product = Product::findOrFail($productId);

        // Cek apakah produk sudah ada di dalam order detail
        $existingOrderDetail = $order->orderDetails()->where('product_id', $productId)->first();

        if ($existingOrderDetail) {
            // Jika produk sudah ada, tambahkan kuantitas
            $existingOrderDetail->quantity += $quantity;
            $existingOrderDetail->save();
        } else {
            // Jika produk belum ada, tambahkan item ke order detail
            $orderDetail = $order->orderDetails()->create([
                'product_id' => $productId,
                'quantity' => $quantity,
                'price' => $product->price,
            ]);
        }

        // Hitung total harga order
        $totalPrice = $order->orderDetails()->sum(DB::raw('price * quantity'));
        $order->total_price = $totalPrice;
        $order->save();

        return response()->json([
            'message' => 'Product added to cart successfully!',
            'order_detail_id' => $existingOrderDetail ? $existingOrderDetail->id : $orderDetail->id,
        ]);
    }
}
