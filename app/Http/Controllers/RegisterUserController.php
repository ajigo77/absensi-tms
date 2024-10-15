<?php

namespace App\Http\Controllers;

use App\Models\Devisi;
use App\Models\Jabatan;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RegisterUserController extends Controller
{
    public function register(){

     $jabatan = Jabatan::all();
        $devisi = Devisi::all();
        return view('Auth.register',compact('jabatan','devisi'));
    }

    public function proses_register(Request $request){
        $request->validate([
            'member_id'=>'required|numeric',
            'divisi_id'=>'required|exists:divisis,id_divisi',
            'jabatan_id'=>'required|exists:jabatan,id_jabatan',
            'password'=>'required|min:5|max:8'
        ]);

        $data_user_register['member_id'] = $request->member_id;
        $data_user_register['divisi_id'] = $request->divisi_id;
        $data_user_register['jabatan_id'] = $request->jabatan_id;
        $data_user_register['password'] = Hash::make($request->password);

        User::create($data_user_register);

        $user_langsung_login = [
            'member_id'=> $request->member_id,
            'password'=> $request->password
        ];

        if(Auth::attempt($user_langsung_login)){
            return redirect()->route('user.shift');
        } else {
            return redirect()->route('auth.login')->with('failed', 'Email atau Password salah');
        }
    }
}
