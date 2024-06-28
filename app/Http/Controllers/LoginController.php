<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use function Laravel\Prompts\alert;

class LoginController extends Controller
{
    public function proses_login(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        $data = [
            'username' => $request->username,
            'password' => $request->password,
        ];

        if (Auth::attempt($data)) {
            return redirect()->route('dashboard')->with('success', 'Anda Telah Berhasil Login,Selamat Bermain');
        } else {
            return redirect()->route('home')->with('failed', 'Username atau Password Salah');
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/')->with('success', 'Anda Telah Berhasil Logout');
    }
}
