<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Order;
use Illuminate\Http\Request;

class DashboardUserController extends Controller
{
    public function index()
    {
        $user = auth()->user();

        return view('dashboard.user.index', compact('user'));
    }

    public function orders()
    {
        $user = auth()->user();
        $orders = Order::where('user_id', $user->id)->where('status', 'done')->orderBy('created_at', 'desc')->get();

        return view('dashboard.user.orders', compact('user', 'orders'));
    }

    public function cart()
    {
        $user = auth()->user();
        $order = $user->currentOrder;

        return view('dashboard.user.cart', compact('user', 'order'));
    }

    public function edit(User $user)
    {
        return view('dashboard.user.profile.edit', compact('user'));
    }
}
