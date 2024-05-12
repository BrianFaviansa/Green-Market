<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CartController extends Controller
{
    public function add(Request $request) {
        $productId = $request->input('product_id');
        $quantity = $request->input('quantity');

        // Lakukan validasi jika diperlukan

        // Dapatkan instance order untuk pengguna saat ini
        $order = $request->user()->currentOrder;

        // Jika belum ada order, buat order baru
        if (!$order) {
            $order = $request->user()->orders()->create([
                'status' => 'pending'
            ]);
        }

        // Tambahkan item ke order detail
        $order->details()->create([
            'product_id' => $productId,
            'quantity' => $quantity
        ]);

        return response()->json([
            'message' => 'Product added to cart successfully!'
        ]);
    }
}
