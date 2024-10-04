<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RegisterUserController extends Controller
{
    public function register(){
        return view('Auth.register');
    }

    public function proses_register(Request $request){
        $request->validate([
            'nama_lengkap'=>'required',
            'divisi'=>'required',
            'email'=>'required|email|unique:users,email',
            'password'=>'required|min:5|max:8'
        ]);

        $data_user_register['name'] = $request->nama_lengkap;
        $data_user_register['divisi'] = $request->divisi;
        $data_user_register['email'] = $request->email;
        $data_user_register['password'] = Hash::make($request->password);

        User::create($data_user_register);

        $user_langsung_login = [
            'email'=> $request->email,
            'password'=> $request->password
        ];

        if(Auth::attempt($user_langsung_login)){
            return redirect()->route('user.shift');
        } else {
            return redirect()->route('auth.login')->with('failed', 'Email atau Password salah');
        }
    }
}
