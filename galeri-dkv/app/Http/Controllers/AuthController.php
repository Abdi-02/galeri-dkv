<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    // Menampilkan halaman form login
    public function tampilLogin()
    {
        return view('login');
    }

    // Memproses data saat tombol login ditekan
    public function prosesLogin(Request $request)
    {
        // Validasi inputan tidak boleh kosong
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        // Cek kecocokan di database
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            
            // Kalau sukses, arahkan ke dashboard admin (nanti kita buat)
            return redirect()->intended('/dashboard'); 
        }

        // Kalau gagal, kembalikan ke halaman login bawa pesan error
        return back()->with('error', 'Email atau Password salah, cuy!');
    }
 
    // Fungsi untuk keluar (logout)
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        
        // Kembali ke halaman utama publik
        return redirect('/');
    }
}