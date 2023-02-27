<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function login()
    {
        return view('login');
    }
    public function loginproses(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|exists:users,email',
            'password' => 'required|min:6',
        ], [
            'email.required' => 'Harus Diisi!',
            'email.exists' => 'Email yang anda masukkan belum terdaftar!',
            'password.required' => 'Harus Diisi!',
            'password.min' => 'Minimal 6 huruf!',
        ]);
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password, 'role' => 'admin'])) {
            return redirect('/welcome');
        }

        return redirect('login')->with('error', 'password yang anda masukan salah');
    }


    public function register()
    {
        return view('register');
    }
    public function registeruser(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|unique:users',
            'password' => 'required|min:6',
        ], [
            'email.required' => 'Email wajib di Isi!',
            'password.required' => 'password Harus Diisi!',
            'email.unique' => 'Email sudah digunakan',
            'password.min' => ' Password Minimal 6 huruf'
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'role' => 'admin',
            'password' => bcrypt($request->password),
            'remember_token' => Str::random(60),
        ]);
        return redirect('/login');
    }

    public function logout()
    {
        auth::logout();
        return redirect()->route('login')->with('success', 'Anda berhasil di Keluar!');
    }
}
