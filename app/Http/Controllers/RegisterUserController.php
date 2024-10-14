<?php

namespace App\Http\Controllers;

use App\Models\Devisi;
use App\Models\Jabatan;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Member;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RegisterUserController extends Controller
{
    public function register()
    {
        $jabatan = Jabatan::all();
        $devisi = Devisi::all();
        return view('Auth.register', compact('jabatan', 'devisi'));
    }




    /**
     * dear aji eror tuh bukan karena tidak ada
     *
     *
     */
    public function make_member (Request $request){}


    public function proses_register(Request $request)
    {

        $customMessageValidate = [
            'member_id.unique' => 'Id member sudah terdaftar',
            'member_id.required' => 'Tidak boleh kosong',
            'member_id.numeric' => 'Hanya boleh angka',
            'divisi_id.required' => 'Tidak boleh kosong',
            'jabatan_id.required' => 'Tidak boleh kosong',
            'password.required' => 'Tidak boleh kosong',
            'password.min' => 'Minimal 5 karakter',
            'password.max' => 'Maximal 8 karakter',
        ];

        $request->validate(
            [
                'member_id' => 'required|exists:members,id_member',
                'divisi_id' => 'required|exists:divisis,id_divisi',
                'jabatan_id' => 'required|exists:jabatans,id_jabatan',
                'password' => 'required|min:5|max:8',
            ],
            $customMessageValidate,
        );

        $data_user_register['member_id'] = $request->member_id;
        $data_user_register['divisi_id'] = $request->divisi_id;
        $data_user_register['jabatan_id'] = $request->jabatan_id;
        $data_user_register['password'] = Hash::make($request->password);

        User::create($data_user_register);


        // Redirect ke halaman login setelah registrasi berhasil
        return redirect()->route('auth.login')->with('success', 'Registrasi berhasil. Silakan login.');
    }



}
