<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    //
    // Tampilkan form registrasi
    public function index()
    {
        return view('auth.register');
    }

    // Proses registrasi pengguna baru
    public function register_proses(Request $request)
    {
        // Validasi input
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        // Buat user baru
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        // Autentikasi user setelah registrasi
        Auth::login($user);

        // Redirect ke dashboard atau halaman lain setelah login
        return redirect()->route('login')->with('success', 'Registrasi berhasil!');
    }
}
