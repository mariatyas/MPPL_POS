<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Admin;
use App\Models\Cashier;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    // Register Admin
    public function registerAdmin(Request $request)
    {
        $request->validate([
            'username' => 'required|string|max:255|unique:admin,username',
            'password' => 'required|string|min:8|confirmed',
        ]);

        Admin::create([
            'username' => $request->username,
            'password' => Hash::make($request->password),
        ]);

        // Redirect ke halaman login admin dengan pesan sukses
        return redirect()->route('login')->with('success', 'Admin registered successfully!');
    }
  
    // Register Cashier
    public function registerCashier(Request $request)
    {
        $request->validate([
            'username' => 'required|string|max:255|unique:cashier,username',
            'password' => 'required|string|min:8|confirmed',
        ]);

        Cashier::create([
            'username' => $request->username,
            'password' => Hash::make($request->password),
        ]);

        // Redirect ke halaman login admin dengan pesan sukses
        return redirect()->route('login')->with('success', 'Admin registered successfully!');
    }

    public function admin()
    {
        return view('auth.admin-register');
    }

    public function cashier()
    {
        return view('auth.cashier-register');
    }

    public function loginfor()
    {
        return view('auth.loginfor');
    }

    public function showAdminRegisterForm() {
        return view('auth.admin-register'); // Ganti dengan nama view yang sesuai
    }
    
    public function showCashierRegisterForm() {
        return view('auth.cashier-register'); // Ganti dengan nama view yang sesuai
    }
    

    // Login method
    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ]);

        // Check if user is an admin
        $admin = Admin::where('username', $request->username)->first();
        if ($admin && Hash::check($request->password, $admin->password)) {
            // Set session for admin
            Session::put('login_type', 'admin');
            Auth::login($admin);
            return redirect()->route('dashboard')->with('success', 'Logged in as admin');
        }

        // Check if user is a cashier
        $cashier = Cashier::where('username', $request->username)->first();
        if ($cashier && Hash::check($request->password, $cashier->password)) {
            // Set session for cashier
            Session::put('login_type', 'cashier');
            Auth::login($cashier);
            return redirect()->route('dashboard')->with('success', 'Logged in as cashier');
        }

        // If no user found in both tables
        return back()->withErrors(['login_failed' => 'Username or password is incorrect']);
    }

    // Logout method
    public function logout()
    {
        Auth::logout();
        Session::forget('login_type'); // Clear the login type session
        return redirect()->route('login')->with('success', 'Logged out successfully');
    }
}