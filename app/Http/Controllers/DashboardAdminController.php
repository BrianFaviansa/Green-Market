<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardAdminController extends Controller
{
    public function index()
    {
        $user = auth()->user();

        return view('dashboard.admin.index', compact('user'));
    }
}
