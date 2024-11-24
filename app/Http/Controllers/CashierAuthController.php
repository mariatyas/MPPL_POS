<?php

namespace App\Http\Controllers;

use App\Models\Cashier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class CashierAuthController extends Controller
{
    // Register view
    public function showRegisterForm()
    {
        return view('auth.cashier-register');
    }

    // Register logic
    public function register(Request $request)
    {
        $request->validate([
            'username' => 'required|string|max:255|unique:cashiers',
            'password' => 'required|string|min:8|confirmed',
        ]);

        Cashier::create([
            'username' => $request->username,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('cashier.login')->with('success', 'Registration successful.');
    }

    // Login view
    public function showLoginForm()
    {
        return view('auth.cashier-login');
    }

    // Login logic
    public function login(Request $request)
    {
        $credentials = $request->only('username', 'password');

        if (Auth::guard('cashier')->attempt($credentials)) {
            return redirect()->route('cashier.dashboard');
        }

        return back()->withErrors(['username' => 'Invalid credentials']);
    }

    // Logout logic
    public function logout()
    {
        Auth::guard('cashier')->logout();
        return redirect()->route('cashier.login');
    }
}
