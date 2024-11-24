<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
     // Menampilkan form register untuk admin
     public function showRegisterForm()
     {
         return view('auth.admin-register');
     }
 
     // Proses register admin
     public function register(Request $request)
     {
    // Validasi input
    $request->validate([
        'name' => 'required|string|max:255|unique:admin,name', // Username harus unik
        'password' => 'required|string|min:8|confirmed', // Konfirmasi password
        'terms' => 'accepted', // Checkbox terms harus dicentang
    ]);

    // Membuat admin baru
    Admin::create([
        'name' => $request->name,
        'password' => Hash::make($request->password),
    ]);

    // Redirect ke halaman login admin dengan pesan sukses
    return redirect()->route('login')->with('success', 'Admin registered successfully!');
     }
}
