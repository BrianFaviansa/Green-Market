<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class LandingController extends Controller
{
    public function index() {

        $products = Product::with('category')->get();
        $categories = Category::all();

        return view('landing.index', compact('products', 'categories'));
    }
}
