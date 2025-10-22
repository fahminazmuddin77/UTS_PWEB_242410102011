<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    // HALAMAN LOGIN
    public function login()
    {
        return view ('login');
    }

    // PROSES LOGIN (VALIDASI AKUN)
    public function authenticate(Request $request)
    {
        $username = $request->input('username');
        $email = $request->input('email');
        $password = $request->input('password');

        // parameter login
        if ($username === 'fahmi' && $email === 'fahmi@gmail.com' && $password === '123') {
            session([
                'username' => $username,
                'email' => $email,
            ]);
            return redirect()->route('dashboard');
        }

        // jika data salah
        return back()->with('error', '❌ Username, Email, atau Password salah!');
    }

    // DASHBOARD
    public function dashboard()
    {
        $username = session('username');
        $email = session('email');

        if (!$username) {
            return redirect()->route('login');
        }

        return view('dashboard', compact('username', 'email'));
    }


    // PROFIL
    public function profile()
    {
        $username = session('username');
        $email = session('email');

        if (!$username) {
            return redirect()->route('login');
        }

        return view('profile', compact('username', 'email'));
    }


    // PENGELOLAAN MENU
    public function pengelolaan()
    {
        $username = session('username');
        $email = session('email');

        if (!$username) {
            return redirect()->route('login');
        }

        $menus = [
            ['nama' => 'Nasi Goreng Spesial', 'harga' => 25000, 'kategori' => 'Makanan'],
            ['nama' => 'Ayam Bakar Madu', 'harga' => 28000, 'kategori' => 'Makanan'],
            ['nama' => 'Es Teh Manis', 'harga' => 8000, 'kategori' => 'Minuman'],
            ['nama' => 'Kopi Hitam', 'harga' => 10000, 'kategori' => 'Minuman'],
            ['nama' => 'Pisang Goreng Keju', 'harga' => 15000, 'kategori' => 'Cemilan'],
            ['nama' => 'Gudeg Joglo', 'harga' => 30000, 'kategori' => 'Makanan Tradisional'],
            ['nama' => 'Sate Lilit Jawa', 'harga' => 27000, 'kategori' => 'Makanan Tradisional'],
            ['nama' => 'Wedang Uwuh', 'harga' => 12000, 'kategori' => 'Minuman Tradisional'],
            ['nama' => 'Tempe Mendoan', 'harga' => 15000, 'kategori' => 'Cemilan Tradisional'],
            ['nama' => 'Lumpia Jogja', 'harga' => 16000, 'kategori' => 'Cemilan Tradisional'],
        ];

        return view('pengelolaan', compact('menus', 'username', 'email'));
    }


    // PROMO SPESIAL MINGGU INI
    public function promo()
    {
        $username = session('username');
        $email = session('email');

        if (!$username) {
            return redirect()->route('login');
        }

    
        $menus = [
            ['nama' => 'Nasi Goreng Spesial', 'harga' => 25000, 'kategori' => 'Makanan'],
            ['nama' => 'Ayam Bakar Madu', 'harga' => 28000, 'kategori' => 'Makanan'],
            ['nama' => 'Es Teh Manis', 'harga' => 8000, 'kategori' => 'Minuman'],
            ['nama' => 'Kopi Hitam', 'harga' => 10000, 'kategori' => 'Minuman'],
            ['nama' => 'Wedang Uwuh', 'harga' => 12000, 'kategori' => 'Minuman'], 
            ['nama' => 'Pisang Goreng Keju', 'harga' => 15000, 'kategori' => 'Cemilan'],
        ];

        // Filter kategori minuman + beri diskon 20%
        $promoMenus = collect($menus)
            ->filter(fn($menu) => $menu['kategori'] === 'Minuman')
            ->map(function ($menu) {
                $menu['harga_diskon'] = $menu['harga'] * 0.8;
                return $menu;
            });

        return view('promo', compact('promoMenus', 'username', 'email'));
    }

   
    // LOGOUT
    public function logout()
    {
        session()->flush();
        return redirect()->route('login');
    }
}
