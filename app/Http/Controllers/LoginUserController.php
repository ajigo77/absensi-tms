<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginUserController extends Controller
{
    public function login(){
        return view('Auth.login');
    }

    public function proses_login(Request $request){
        $request->validate([
            'member_id'=>'required|numeric',
            'password'=>'required'
        ]);

        $data = [
            'member_id'=> $request->member_id,
            'password'=> $request->password
        ];

        if(Auth::attempt($data)){
            return redirect()->route('user.shift');
        } else {
            return redirect()->route('auth.login')->with('failed', 'Email atau Password salah');
        }
    }

    public function logout(){
        Auth::logout();
        return redirect()->route('auth.login')->with('success', 'Anda berhasil logout');
    }
}
