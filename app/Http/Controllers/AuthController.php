<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }

    public function authenticate(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required|email:dns',
            'password' => 'required|min:3',
        ]);

        if (Auth::attempt($validated)) {
            $user = auth()->user();
            if (Auth::user()->is_admin == 1) {
                return redirect()->route('admin.dashboard', compact('user'));
            }
            if (Auth::user()->is_admin == 0) {
                return redirect()->route('user.carts', compact('user'));
            }
        } else {
            return redirect('login')->with('error', 'Incorrect Email or Password!');
        }
    }

    public function register()
    {
        return view('auth.register');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => ['required|max:255'],
            'email' => ['required|max:255|email:dns'],
            'password' => ['required|min:3'],
        ]);

        $validatedData['password'] = bcrypt($validatedData['password']);

        User::create($validatedData);

        return redirect()->route('login')->with('success', 'Register success, please login');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('landing')->with('success', 'Logout berhasil');
    }
}
