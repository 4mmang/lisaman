<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function validation(Request $request)
    {
        $credentials = $request->only(['username', 'password']);
        if (Auth::attempt($credentials)) {
            if (Auth::user()->role === 'admin') {
                return redirect('admin/dashboard');
            }
            return redirect()->intended('/');
        }
        return back()->with([
            'message' => 'Username atau password invalid',
        ]);
    }

    public function logout(Request $request)
    {
        // memanggil fungsi logout dari class Auth
        Auth::logout();
        // method ini juga akan memanggil 2 fungsi dibawah
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        // dan mengembalikan kehalaman login
        return redirect('login');
    }
}
