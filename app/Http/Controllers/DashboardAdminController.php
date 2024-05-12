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

    public function customers()
    {
        $customers = User::where('is_admin', 0)->get();
        $user = auth()->user();

        return view('dashboard.admin.customers.index', compact('user', 'customers'));
    }

    public function categories()
    {
        $categories = Category::all();
        $user = auth()->user();

        return view('dashboard.admin.categories.index', compact('user', 'categories'));
    }
}
