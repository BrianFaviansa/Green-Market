<?php

namespace App\Http\Controllers;

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
        $orders = Order::where('user_id', $user->id)->orderBy('created_at', 'desc')->get();

        return view('dashboard.user.orders.index', compact('user'));
    }
}
