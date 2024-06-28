<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class RegistController extends Controller
{
    public function proses_registrasi(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'username' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required'
        ]);
        $data = [
            'username' => $request->username,
            'email' => $request->email,
            'password' => $request->password
        ];

        if(User::create($data)){
            return redirect('/')->with('success', 'Anda Telah Berhasil Registrasi, Silahkan Login');
        }
    }
}
