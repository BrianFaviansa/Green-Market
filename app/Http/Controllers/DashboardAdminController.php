<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Order;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class DashboardAdminController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        $users = User::where('is_admin', 0)->count();
        $products = Product::count();
        $categories = Category::count();
        $orders = Order::count();

        return view('dashboard.admin.index', compact('user', 'users', 'products', 'orders', 'categories'));
    }
}
