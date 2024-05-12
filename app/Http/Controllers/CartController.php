<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
    public function index(Request $request)
    {
        $order = $request->user()->currentOrder;
        $user = auth()->user();

        return view('dashboard.user.cart', compact('user', 'order'));
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

        // Tambahkan item ke order detail
        $orderDetail = $order->orderDetails()->create([
            'product_id' => $productId,
            'quantity' => $quantity,
            'price' => $product->price, // Asumsikan field 'price' tersedia pada tabel 'products'
        ]);

        // Hitung total harga order
        $totalPrice = $order->orderDetails()->sum(DB::raw('price * quantity'));
        $order->total_price = $totalPrice;
        $order->save();

        return response()->json([
            'message' => 'Product added to cart successfully!',
            'order_detail_id' => $orderDetail->id,
        ]);
    }
}
