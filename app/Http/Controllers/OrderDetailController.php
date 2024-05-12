<?php

namespace App\Http\Controllers;

use App\Models\OrderDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(OrderDetail $orderDetail)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(OrderDetail $orderDetail)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */

    public function update(Request $request)
    {
        $orderDetailId = $request->input('order_detail_id');
        $quantity = $request->input('quantity');

        // Perbarui kuantitas order_detail
        $orderDetail = OrderDetail::findOrFail($orderDetailId);
        $orderDetail->quantity = $quantity;
        $orderDetail->save();

        // Hitung total harga order
        $order = $orderDetail->order;
        $totalPrice = $order->details()->sum(DB::raw('price * quantity'));
        $order->total_price = $totalPrice;
        $order->save();

        return response()->json(['success' => true, 'total_price' => $totalPrice]);
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(OrderDetail $orderDetail)
    {
        //
    }
}
