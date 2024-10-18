<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginUserController extends Controller
{
    protected $redirectTo = '/index'; // Ganti dari /home ke /index

    // public function login()
    // {
    //     return view('Auth.login');
    // }

    public function login()
    {
        // Jika user sudah login, arahkan ke halaman index
        if (Auth::check()) {
            return redirect()->route('index');
        }

        // Jika belum login, tampilkan halaman login
        return view('auth.login');
    }

    public function proses_login(Request $request)
    {
        $customMessageValidate = [
            'member_id.required' => 'Id member tidak boleh kosong',
            'member_id.numeric' => 'Hanya boleh angka',
            'password.required' => 'Password tidak boleh kosong',
            'password.min' => 'Minimal 5 karakter',
            'password.max' => 'Maximal 8 karakter',
        ];

        $credentials = $request->validate(
            [
                'member_id' => 'required|numeric',
                'password' => 'required|min:5|max:8',
            ],
            $customMessageValidate,
        );

        // Autentikasi user
        if (Auth::attempt($credentials)) {
            // Regenerasi session untuk keamanan
            $request->session()->regenerate();

            // Redirect ke halaman index setelah berhasil login
            return redirect()->route('index');
        }

        // dd('login gagal');
        return redirect()->route('auth.login')->with('failed', 'Email atau Password salah');
    }

    public function logout(Request $request): RedirectResponse
    {
        Auth::logout(); // Logout user

        // Hapus semua data session
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        // Redirect ke halaman login setelah logout
        return redirect()->route('auth.login');
    }
}
