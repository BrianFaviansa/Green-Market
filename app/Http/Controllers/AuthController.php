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
            'password' => 'required|min:5',
        ]);

        if (Auth::attempt($validated)) {
            $user = auth()->user();
            if (Auth::user()->is_admin == 1) {
                return redirect()->route('admin.dashboard', compact('user'));
            }
            if (Auth::user()->is_admin == 0) {
                return redirect()->route('user.dashboard', compact('user'));
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
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:5', 'confirmed'],
        ]);

        User::create($validatedData);

        return redirect()->route('login')->with('success', 'Registrasi berhasil!');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('landing')->with('success', 'Logout berhasil');
    }
}
