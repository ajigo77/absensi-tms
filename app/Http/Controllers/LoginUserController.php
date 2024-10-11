<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginUserController extends Controller
{
    public function login()
    {
        return view('Auth.login');
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
        $request->validate([
            'member_id' => 'required|numeric',
            'password' => 'required|min:5|max:8',
        ], $customMessageValidate);

        $data = [
            'member_id' => $request->member_id,
            'password' => $request->password,
        ];

        if (Auth::attempt($data)) {
            // dd('Login berhasil');
            return redirect()->route('shift');
        } else {
            // dd('Login gagal');
            return redirect()->route('auth.login')->with('failed', 'Email atau Password salah');
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('auth.login')->with('success', 'Anda berhasil logout');
    }
}
