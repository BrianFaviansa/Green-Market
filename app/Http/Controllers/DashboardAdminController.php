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
        $orders = Order::where('status', 'done')->count();

        return view('dashboard.admin.index', compact('user', 'users', 'products', 'orders', 'categories'));
    }

    public function customers()
    {
        $customers = User::where('is_admin', 0)->orderBy('name')->get();
        $user = auth()->user();

        return view('dashboard.admin.customers.index', compact('user', 'customers'));
    }

    public function categories()
    {
        $categories = Category::orderBy('category_name')->get();
        $user = auth()->user();

        return view('dashboard.admin.categories.index', compact('user', 'categories'));
    }

    public function products()
    {
        $products = Product::with('category')->orderBy('category_id')->orderBy('product_name')->get();
        $categories = Category::all();
        $user = auth()->user();

        return view('dashboard.admin.products.index', compact('user', 'products', 'categories'));
    }

    public function orders() {
        $orders = Order::with('user')->where('status', 'done')->orderBy('created_at', 'desc')->get();
        $user = auth()->user();

        return view('dashboard.admin.orders.index', compact('user', 'orders'));
    }
}
